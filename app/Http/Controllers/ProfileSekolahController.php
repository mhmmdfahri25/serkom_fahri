<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;

class ProfileSekolahController extends Controller
{
    public function index()
    {
        $profilSekolah = ProfileSekolah::first();

        if (!$profilSekolah) {
            $profilSekolah = new ProfileSekolah();
            $profilSekolah->id_sekolah = 1;
            $profilSekolah->nama_sekolah = 'Nama Sekolah';
            $profilSekolah->kepala_sekolah = 'Kepala Sekolah';
            $profilSekolah->alamat = 'Alamat Sekolah';
            $profilSekolah->kontak = 'Nomor Kontak';
            $profilSekolah->{'visi-misi'} = 'Visi dan Misi Sekolah';
            $profilSekolah->tahun_berdiri = date('Y');
            $profilSekolah->deskripsi = 'Deskripsi singkat sekolah.';
            $profilSekolah->save();
        }

        return view('admin.profil-sekolah.index', compact('profilSekolah'));
    }

    public function form()
    {
        $profilSekolah = ProfileSekolah::firstOrFail();

        return view('admin.profil-sekolah.form', compact('profilSekolah'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'kepala_sekolah' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:255',
            'visi-misi' => 'required|string',
            'tahun_berdiri' => 'required|digits:4|integer',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:5120',
        ], [
            'nama_sekolah.required' => 'Nama sekolah wajib diisi.',
            'kepala_sekolah.required' => 'Nama kepala sekolah wajib diisi.',
            'alamat.required' => 'Alamat sekolah wajib diisi.',
            'kontak.required' => 'Kontak sekolah wajib diisi.',
            'visi-misi.required' => 'Visi dan misi wajib diisi.',
            'tahun_berdiri.required' => 'Tahun berdiri wajib diisi.',
            'tahun_berdiri.digits' => 'Tahun berdiri harus 4 digit angka.',
            'foto.image' => 'Foto sekolah harus berupa gambar.',
            'logo.image' => 'Logo sekolah harus berupa gambar.',
        ]);

        $profilSekolah = ProfileSekolah::first();

        if (!$profilSekolah) {
            $profilSekolah = new ProfileSekolah();
            $profilSekolah->id_sekolah = 1;
        }

        $profilSekolah->nama_sekolah = $request->nama_sekolah;
        $profilSekolah->kepala_sekolah = $request->kepala_sekolah;
        $profilSekolah->alamat = $request->alamat;
        $profilSekolah->kontak = $request->kontak;
        $profilSekolah->{'visi-misi'} = $request->{'visi-misi'};
        $profilSekolah->tahun_berdiri = $request->tahun_berdiri;
        $profilSekolah->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_foto.' . $foto->getClientOriginalExtension();
            $folder = public_path('uploads/sekolah');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $foto->move($folder, $namaFoto);
            $profilSekolah->foto = $namaFoto;
        }

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $namaLogo = time() . '_logo.' . $logo->getClientOriginalExtension();
            $folder = public_path('uploads/sekolah');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $logo->move($folder, $namaLogo);
            $profilSekolah->logo = $namaLogo;
        }

        $profilSekolah->save();

        return redirect()->route('admin.profil-sekolah')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }

    public function publicProfile()
    {
        $profileSekolah = ProfileSekolah::first();

        return view('public.profile', compact('profileSekolah'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;

class ProfileSekolahController extends Controller
{
    /**
     * Menampilkan profile sekolah
     */
    public function index()
    {
        $sekolah = ProfileSekolah::first();

        return view('admin.profilesekolah.profile', compact('sekolah'));
    }

    /**
     * Menampilkan halaman edit profile sekolah
     */
    public function edit()
    {
        $sekolah = ProfileSekolah::first();

        return view('admin.profilesekolah.profile_edit', compact('sekolah'));
    }

    /**
     * Menyimpan perubahan profile sekolah
     */
    public function update(Request $request)
    {
        $sekolah = ProfileSekolah::first();

        if (!$sekolah) {
            return redirect()
                ->route('admin.profile')
                ->with('error', 'Data profile sekolah belum tersedia.');
        }

        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'kepala_sekolah' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:255',
            'visi-misi' => 'required|string',
            'tahun_berdiri' => 'required|digits:4',
            'deskripsi' => 'required|string',

           'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',

           'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:5120',
        ]);

        /*
        |--------------------------------------------------------------------------
        | DATA PROFILE
        |--------------------------------------------------------------------------
        */

        $sekolah->nama_sekolah = $request->nama_sekolah;

        $sekolah->kepala_sekolah = $request->kepala_sekolah;

        $sekolah->alamat = $request->alamat;

        $sekolah->kontak = $request->kontak;

        $sekolah->{'visi-misi'} = $request->{'visi-misi'};

        $sekolah->tahun_berdiri = $request->tahun_berdiri;

        $sekolah->deskripsi = $request->deskripsi;


        /*
        |--------------------------------------------------------------------------
        | FOTO SEKOLAH
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto');

            $namaFoto = time()
                . '_foto.'
                . $foto->getClientOriginalExtension();

            $folder = public_path('uploads/sekolah');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $foto->move(
                $folder,
                $namaFoto
            );

            $sekolah->foto = $namaFoto;
        }


        /*
        |--------------------------------------------------------------------------
        | LOGO SEKOLAH
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {

            $logo = $request->file('logo');

            $namaLogo = time()
                . '_logo.'
                . $logo->getClientOriginalExtension();

            $folder = public_path('uploads/sekolah');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $logo->move(
                $folder,
                $namaLogo
            );

            $sekolah->logo = $namaLogo;
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN
        |--------------------------------------------------------------------------
        */

        $sekolah->save();


        return redirect()
            ->route('admin.profile')
            ->with(
                'success',
                'Profile sekolah berhasil diperbarui.'
            );
    }
}

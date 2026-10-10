<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::latest()->get();

        return view('admin.guru.index', compact('guru'));
    }

    public function addEdit($id = null)
    {
        try {
            $guru = $id
                ? Guru::findOrFail(Crypt::decrypt($id))
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.guru.index')
                ->with('error', 'Data guru tidak ditemukan.');
        }

        return view('admin.guru.form', compact('guru'));
    }

    public function save(Request $request, $id = null)
    {
        if ($id) {
            try {
                $id = Crypt::decrypt($id);
                $guru = Guru::findOrFail($id);
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.guru.index')
                    ->with('error', 'Data guru tidak ditemukan.');
            }
        } else {
            $guru = new Guru();
        }

        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:guru,nip,' . ($id ?? 'NULL') . ',id',
            'mata_pelajaran' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'nama_guru.required' => 'Nama guru wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah terdaftar pada guru lain.',
            'mata_pelajaran.required' => 'Mata pelajaran wajib diisi.',
            'foto.image' => 'Foto harus berupa file gambar.',
            'foto.max' => 'Ukuran foto maksimal 5MB.',
        ]);

        $guru->nama_guru = $request->nama_guru;
        $guru->nip = $request->nip;
        $guru->mata_pelajaran = $request->mata_pelajaran;

        if ($request->hasFile('foto')) {
            if (
                $guru->foto &&
                file_exists(public_path('uploads/guru/' . $guru->foto))
            ) {
                unlink(public_path('uploads/guru/' . $guru->foto));
            }

            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();

            $folder = public_path('uploads/guru');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $foto->move($folder, $namaFoto);

            $guru->foto = $namaFoto;
        }

        $guru->save();

        return redirect()
            ->route('admin.guru.index')
            ->with(
                'success',
                $id
                    ? 'Data guru berhasil diperbarui.'
                    : 'Data guru berhasil disimpan.'
            );
    }

    public function show($id)
    {
        try {
            $guru = Guru::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.guru.index')
                ->with('error', 'Data guru tidak ditemukan.');
        }

        return view('admin.guru.show', compact('guru'));
    }

    public function destroy($id)
    {
        try {
            $guru = Guru::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.guru.index')
                ->with('error', 'Data guru tidak ditemukan.');
        }

        if (
            $guru->foto &&
            file_exists(public_path('uploads/guru/' . $guru->foto))
        ) {
            unlink(public_path('uploads/guru/' . $guru->foto));
        }

        $guru->delete();

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }

    public function publicGuru()
    {
        $sekolah = \App\Models\ProfileSekolah::first();
        $guru = Guru::latest()->paginate(6);

        return view('public.guru', compact('sekolah', 'guru'));
    }

    public function publicShow($id)
    {
        $sekolah = \App\Models\ProfileSekolah::first();
        $guru = Guru::findOrFail($id);

        return view('public.guru-detail', compact('sekolah', 'guru'));
    }
}

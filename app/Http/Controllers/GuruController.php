<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Tampilkan data guru
    public function index(Request $request)
    {
        $query = Guru::query();

        // Pencarian
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_guru', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%')
                    ->orWhere('mata_pelajaran', 'like', '%' . $search . '%');
            });
        }

        $gurus = $query
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.guru.guru', [
            'title' => 'Data Guru',
            'gurus' => $gurus,
        ]);
    }

    // Form tambah guru
    public function create()
    {
        return view('admin.guru.tambah', [
            'title' => 'Tambah Guru',
        ]);
    }

    // Simpan guru
    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $namaFoto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            $namaFoto = time() . '_' . $foto->getClientOriginalName();

            $folder = public_path('uploads/guru');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $foto->move($folder, $namaFoto);
        }

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mata_pelajaran' => $request->mata_pelajaran,
            'foto' => $namaFoto,
        ]);

        return redirect()
            ->route('admin.guru')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    // Form edit
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);

        return view('admin.guru.edit', [
            'title' => 'Edit Guru',
            'guru' => $guru,
        ]);
    }

    // Update guru
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $guru = Guru::findOrFail($id);

        $namaFoto = $guru->foto;

        if ($request->hasFile('foto')) {

            // Hapus foto lama
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
        }

        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mata_pelajaran' => $request->mata_pelajaran,
            'foto' => $namaFoto,
        ]);

        return redirect()
            ->route('admin.guru')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    // Hapus guru
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        // Hapus foto
        if (
            $guru->foto &&
            file_exists(public_path('uploads/guru/' . $guru->foto))
        ) {
            unlink(public_path('uploads/guru/' . $guru->foto));
        }

        $guru->delete();

        return redirect()
            ->route('admin.guru')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}

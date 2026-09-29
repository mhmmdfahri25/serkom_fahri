<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::query();

        // Pencarian
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('nama_siswa', 'like', '%' . $search . '%')
                  ->orWhere('jenis_kelamin', 'like', '%' . $search . '%');

            });
        }

        $siswas = $query
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.siswa.siswa', [
            'title' => 'Data Siswa',
            'siswas' => $siswas,
        ]);
    }


    public function create()
    {
        return view('admin.siswa.tambah', [
            'title' => 'Tambah Siswa',
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
        'nisn' => 'required|string|max:20',
        'nama_siswa' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'tahun_masuk' => 'required|digits:4',
    ]);

    Siswa::create([
        'nisn' => $request->nisn,
        'nama_siswa' => $request->nama_siswa,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tahun_masuk' => $request->tahun_masuk,
    ]);

    return redirect()
        ->route('admin.siswa')
        ->with('success', 'Data siswa berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view('admin.siswa.edit', [
            'title' => 'Edit Siswa',
            'siswa' => $siswa,
        ]);
    }


    public function update(Request $request, $id)
    {
      $request->validate([
        'nisn' => 'required|string|max:20',
        'nama_siswa' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'tahun_masuk' => 'required|digits:4',
    ]);

    $siswa = Siswa::findOrFail($id);

    $siswa->update([
        'nisn' => $request->nisn,
        'nama_siswa' => $request->nama_siswa,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tahun_masuk' => $request->tahun_masuk,
    ]);

    return redirect()
        ->route('admin.siswa')
        ->with('success', 'Data siswa berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()
            ->route('admin.siswa')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}

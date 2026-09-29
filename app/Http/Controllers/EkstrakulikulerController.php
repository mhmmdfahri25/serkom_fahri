<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    public function index(Request $request)
    {
        $query = Ekstrakulikuler::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_ekstrakulikuler', 'like', '%' . $search . '%')
                    ->orWhere('pembina', 'like', '%' . $search . '%')
                    ->orWhere('jadwal_latihan', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        $ekstrakulikulers = $query->orderBy('id', 'desc')->get();

        return view('admin.ekstrakulikuler.ekstrakulikuler', [
            'title' => 'Ekstrakulikuler',
            'ekstrakulikulers' => $ekstrakulikulers,
        ]);
    }

    public function create()
    {
        return view('admin.ekstrakulikuler.tambah', [
            'title' => 'Tambah Ekstrakulikuler'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ekstrakulikuler' => 'required|string|max:255',
            'pembina' => 'required|string|max:255',
            'jadwal_latihan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $namaFoto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            $namaFoto = time() . '_' . $foto->getClientOriginalName();

            $folder = public_path('uploads/ekstrakulikuler');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $foto->move($folder, $namaFoto);
        }

        Ekstrakulikuler::create([
            'nama_ekstrakulikuler' => $request->nama_ekstrakulikuler,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'foto' => $namaFoto,
        ]);

        return redirect()
            ->route('admin.ekstrakulikuler')
            ->with('success', 'Data ekstrakulikuler berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        return view('admin.ekstrakulikuler.edit', [
            'title' => 'Edit Ekstrakulikuler',
            'ekstrakulikuler' => $ekstrakulikuler,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ekstrakulikuler' => 'required|string|max:255',
            'pembina' => 'required|string|max:255',
            'jadwal_latihan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        $namaFoto = $ekstrakulikuler->foto;

        if ($request->hasFile('foto')) {

            if (
                $ekstrakulikuler->foto &&
                file_exists(
                    public_path(
                        'uploads/ekstrakulikuler/' .
                        $ekstrakulikuler->foto
                    )
                )
            ) {
                unlink(
                    public_path(
                        'uploads/ekstrakulikuler/' .
                        $ekstrakulikuler->foto
                    )
                );
            }

            $foto = $request->file('foto');

            $namaFoto = time() . '_' . $foto->getClientOriginalName();

            $folder = public_path('uploads/ekstrakulikuler');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $foto->move($folder, $namaFoto);
        }

        $ekstrakulikuler->update([
            'nama_ekstrakulikuler' => $request->nama_ekstrakulikuler,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'foto' => $namaFoto,
        ]);

        return redirect()
            ->route('admin.ekstrakulikuler')
            ->with('success', 'Data ekstrakulikuler berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        if (
            $ekstrakulikuler->foto &&
            file_exists(
                public_path(
                    'uploads/ekstrakulikuler/' .
                    $ekstrakulikuler->foto
                )
            )
        ) {
            unlink(
                public_path(
                    'uploads/ekstrakulikuler/' .
                    $ekstrakulikuler->foto
                )
            );
        }

        $ekstrakulikuler->delete();

        return redirect()
            ->route('admin.ekstrakulikuler')
            ->with('success', 'Data ekstrakulikuler berhasil dihapus.');
    }
}

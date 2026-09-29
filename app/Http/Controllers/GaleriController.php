<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('keterangan', 'like', '%' . $search . '%')
                    ->orWhere('kategori', 'like', '%' . $search . '%');
            });
        }

        $galeris = $query->orderBy('id', 'desc')->get();

        return view('admin.galeri.galeri', [
            'title' => 'Galeri',
            'galeris' => $galeris,
        ]);
    }

    public function create()
    {
        return view('admin.galeri.tambah', [
            'title' => 'Tambah Galeri'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'kategori' => 'required|in:foto,video',
            'tanggal' => 'required|date',
            'foto' => 'required|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,mkv|max:20480',
        ]);

        $fileName = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');

            $fileName = time() . '_' . $file->getClientOriginalName();

            $folder = public_path('uploads/galeri');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $file->move($folder, $fileName);
        }

        Galeri::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'foto' => $fileName,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()
            ->route('admin.galeri')
            ->with('success', 'Data galeri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.edit', [
            'title' => 'Edit Galeri',
            'galeri' => $galeri,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'kategori' => 'required|in:foto,video',
            'tanggal' => 'required|date',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,mkv|max:20480',
        ]);

        $galeri = Galeri::findOrFail($id);

        $fileName = $galeri->foto;

        if ($request->hasFile('foto')) {

            if (
                $galeri->foto &&
                file_exists(public_path('uploads/galeri/' . $galeri->foto))
            ) {
                unlink(public_path('uploads/galeri/' . $galeri->foto));
            }

            $file = $request->file('foto');

            $fileName = time() . '_' . $file->getClientOriginalName();

            $folder = public_path('uploads/galeri');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $file->move($folder, $fileName);
        }

        $galeri->update([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'foto' => $fileName,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()
            ->route('admin.galeri')
            ->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if (
            $galeri->foto &&
            file_exists(public_path('uploads/galeri/' . $galeri->foto))
        ) {
            unlink(public_path('uploads/galeri/' . $galeri->foto));
        }

        $galeri->delete();

        return redirect()
            ->route('admin.galeri')
            ->with('success', 'Data galeri berhasil dihapus.');
    }
}

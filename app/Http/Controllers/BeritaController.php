<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('isi', 'like', '%' . $search . '%')
                    ->orWhere('tanggal', 'like', '%' . $search . '%');
            });
        }

        $beritas = $query->orderBy('id', 'desc')->get();

        return view('admin.berita.berita', [
            'title' => 'Berita',
            'beritas' => $beritas,
        ]);
    }

    public function create()
    {
        return view('admin.berita.tambah', [
            'title' => 'Tambah Berita'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $namaFoto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            $namaFoto = time() . '_' . $foto->getClientOriginalName();

            $folder = public_path('uploads/berita');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $foto->move($folder, $namaFoto);
        }

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'foto' => $namaFoto,
        ]);

        return redirect()
            ->route('admin.berita')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.edit', [
            'title' => 'Edit Berita',
            'berita' => $berita,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $berita = Berita::findOrFail($id);

        $namaFoto = $berita->foto;

        if ($request->hasFile('foto')) {

            if (
                $berita->foto &&
                file_exists(public_path('uploads/berita/' . $berita->foto))
            ) {
                unlink(public_path('uploads/berita/' . $berita->foto));
            }

            $foto = $request->file('foto');

            $namaFoto = time() . '_' . $foto->getClientOriginalName();

            $folder = public_path('uploads/berita');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $foto->move($folder, $namaFoto);
        }

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'foto' => $namaFoto,
        ]);

        return redirect()
            ->route('admin.berita')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if (
            $berita->foto &&
            file_exists(public_path('uploads/berita/' . $berita->foto))
        ) {
            unlink(public_path('uploads/berita/' . $berita->foto));
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita')
            ->with('success', 'Berita berhasil dihapus.');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.detail', [
            'title' => 'Detail Berita',
            'berita' => $berita,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

        return view('admin.berita.index', [
            'title' => 'Berita',
            'beritas' => $beritas
        ]);
    }

    public function addEdit($id = null)
    {
        try {
            $berita = $id
                ? Berita::findOrFail(Crypt::decrypt($id))
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.berita')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        return view('admin.berita.form', [
            'title' => $berita ? 'Edit Berita' : 'Tambah Berita',
            'berita' => $berita
        ]);
    }

    public function save(Request $request, $id = null)
    {
        if ($id) {
            try {
                $id = Crypt::decrypt($id);
                $berita = Berita::findOrFail($id);
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.berita')
                    ->with('error', 'Data berita tidak ditemukan.');
            }
        } else {
            $berita = new Berita();
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'judul.required' => 'Judul berita wajib diisi.',
            'judul.max' => 'Judul berita maksimal 255 karakter.',
            'isi.required' => 'Isi berita wajib diisi.',
            'tanggal.required' => 'Tanggal berita wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 5MB.',
        ]);

        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->tanggal = $request->tanggal;

        if ($request->hasFile('foto')) {
            if ($berita->foto && file_exists(public_path('uploads/berita/' . $berita->foto))) {
                unlink(public_path('uploads/berita/' . $berita->foto));
            }

            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            $folder = public_path('uploads/berita');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $foto->move($folder, $namaFoto);
            $berita->foto = $namaFoto;
        }

        $berita->save();

        return redirect()
            ->route('admin.berita')
            ->with(
                'success',
                $id
                    ? 'Berita berhasil diperbarui.'
                    : 'Berita berhasil ditambahkan.'
            );
    }

    public function show($id)
    {
        try {
            $berita = Berita::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.berita')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        return view('admin.berita.show', [
            'title' => 'Detail Berita',
            'berita' => $berita
        ]);
    }

    public function destroy($id)
    {
        try {
            $berita = Berita::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.berita')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        if ($berita->foto && file_exists(public_path('uploads/berita/' . $berita->foto))) {
            unlink(public_path('uploads/berita/' . $berita->foto));
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita')
            ->with('success', 'Berita berhasil dihapus.');
    }

   public function publicBerita()
    {
        $sekolah = \App\Models\ProfileSekolah::first();
        $berita = Berita::latest('tanggal')->get();

        return view('public.berita', compact('sekolah', 'berita'));
    }

    public function publicShow($id)
    {
        $sekolah = \App\Models\ProfileSekolah::first();
        $berita = Berita::findOrFail($id);

        return view('public.berita-detail', compact('sekolah', 'berita'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BeritaController extends Controller
{
    /**
     * Admin dapat mengubah semua berita.
     * Operator hanya dapat mengubah berita miliknya sendiri.
     */
    private function beritaYangBolehDiubah()
    {
        $user = Auth::user();

        $query = Berita::query();

        if (!$user || $user->role !== 'admin') {
            $query->where('id_user', Auth::id());
        }

        return $query;
    }

    /**
     * Semua operator dapat melihat semua berita (menggunakan pagination).
     */
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

        // Diubah menggunakan paginate(10) agar lebih optimal
        $beritas = $query->orderByDesc('id')->paginate(10);

        return view('admin.berita.index', [
            'title' => 'Berita',
            'beritas' => $beritas,
        ]);
    }

    /**
     * Form tambah atau edit berita.
     */
    public function addEdit($id = null)
    {
        $berita = null;

        if ($id !== null) {
            try {
                $idAsli = Crypt::decrypt($id);

                $berita = $this->beritaYangBolehDiubah()
                    ->findOrFail($idAsli);
            } catch (\Throwable $e) {
                return redirect()
                    ->route('admin.berita')
                    ->with(
                        'error',
                        'Berita tidak ditemukan atau Anda tidak memiliki akses untuk mengeditnya.'
                    );
            }
        }

        return view('admin.berita.form', [
            'title' => $berita ? 'Edit Berita' : 'Tambah Berita',
            'berita' => $berita,
        ]);
    }

    /**
     * Simpan berita baru atau perubahan berita.
     */
    public function save(Request $request, $id = null)
    {
        $idAsli = null;

        if ($id !== null) {
            try {
                $idAsli = Crypt::decrypt($id);

                $berita = $this->beritaYangBolehDiubah()
                    ->findOrFail($idAsli);
            } catch (\Throwable $e) {
                return redirect()
                    ->route('admin.berita')
                    ->with(
                        'error',
                        'Berita tidak ditemukan atau Anda tidak memiliki akses untuk mengubahnya.'
                    );
            }
        } else {
            $berita = new Berita();
            $berita->id_user = Auth::id();
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
            $folder = public_path('uploads/berita');

            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }

            if (
                $berita->foto &&
                file_exists($folder . DIRECTORY_SEPARATOR . $berita->foto)
            ) {
                unlink($folder . DIRECTORY_SEPARATOR . $berita->foto);
            }

            $foto = $request->file('foto');
            $namaFoto = time() . '_' . uniqid() . '.' . $foto->extension();
            $foto->move($folder, $namaFoto);

            $berita->foto = $namaFoto;
        }

        $berita->save();

        return redirect()
            ->route('admin.berita')
            ->with(
                'success',
                $idAsli !== null
                    ? 'Berita berhasil diperbarui.'
                    : 'Berita berhasil ditambahkan.'
            );
    }

    /**
     * Semua operator boleh melihat detail berita.
     */
    public function show($id)
    {
        try {
            $idAsli = Crypt::decrypt($id);
            $berita = Berita::findOrFail($idAsli);
        } catch (\Throwable $e) {
            return redirect()
                ->route('admin.berita')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        return view('admin.berita.show', [
            'title' => 'Detail Berita',
            'berita' => $berita,
        ]);
    }

    /**
     * Hapus hanya berita milik sendiri, kecuali admin.
     */
    public function destroy($id)
    {
        try {
            $idAsli = Crypt::decrypt($id);

            $berita = $this->beritaYangBolehDiubah()
                ->findOrFail($idAsli);
        } catch (\Throwable $e) {
            return redirect()
                ->route('admin.berita')
                ->with(
                    'error',
                    'Berita tidak ditemukan atau Anda tidak memiliki akses untuk menghapusnya.'
                );
        }

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

    /**
     * Daftar berita untuk pengunjung website.
     */
    public function publicBerita()
    {
        $sekolah = \App\Models\ProfileSekolah::first();
        $berita = Berita::latest('tanggal')->get();

        return view('public.berita', compact('sekolah', 'berita'));
    }

    /**
     * Detail berita untuk pengunjung website.
     */
    public function publicShow($id)
    {
        $sekolah = \App\Models\ProfileSekolah::first();
        $berita = Berita::findOrFail($id);

        return view(
            'public.berita-detail',
            compact('sekolah', 'berita')
        );
    }
}

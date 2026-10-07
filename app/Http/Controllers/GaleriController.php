<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

        return view('admin.galeri.index', [
            'title' => 'Galeri',
            'galeris' => $galeris,
        ]);
    }

    public function addEdit($id = null)
    {
        try {
            $galeri = $id
                ? Galeri::findOrFail(Crypt::decrypt($id))
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.galeri')
                ->with('error', 'Data galeri tidak ditemukan.');
        }

        return view('admin.galeri.form', [
            'title' => $galeri ? 'Edit Galeri' : 'Tambah Galeri',
            'galeri' => $galeri,
        ]);
    }

    public function save(Request $request, $id = null)
    {
        if ($id) {
            try {
                $id = Crypt::decrypt($id);
                $galeri = Galeri::findOrFail($id);
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.galeri')
                    ->with('error', 'Data galeri tidak ditemukan.');
            }
        } else {
            $galeri = new Galeri();
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'kategori' => 'required|in:foto,video',
            'tanggal' => 'required|date',
            'foto' => $id
                ? 'nullable|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,mkv|max:20480'
                : 'required|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,mkv|max:20480',
        ], [
            'judul.required' => 'Judul galeri wajib diisi.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'kategori.in' => 'Kategori harus berupa foto atau video.',
            'tanggal.required' => 'Tanggal wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
            'foto.required' => 'File foto atau video wajib diupload.',
            'foto.file' => 'File yang diupload tidak valid.',
            'foto.mimes' => 'File harus berupa JPG, JPEG, PNG, WEBP, MP4, MOV, AVI, atau MKV.',
            'foto.max' => 'Ukuran file maksimal 20MB.',
        ]);

        $galeri->judul = $request->judul;
        $galeri->keterangan = $request->keterangan;
        $galeri->kategori = $request->kategori;
        $galeri->tanggal = $request->tanggal;

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

            $galeri->foto = $fileName;
        }

        $galeri->save();

        return redirect()
            ->route('admin.galeri')
            ->with(
                'success',
                $id
                    ? 'Data galeri berhasil diperbarui.'
                    : 'Data galeri berhasil ditambahkan.'
            );
    }

    public function show($id)
    {
        try {
            $galeri = Galeri::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.galeri')
                ->with('error', 'Data galeri tidak ditemukan.');
        }

        return view('admin.galeri.show', [
            'title' => 'Detail Galeri',
            'galeri' => $galeri,
        ]);
    }

    public function destroy($id)
    {
        try {
            $galeri = Galeri::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.galeri')
                ->with('error', 'Data galeri tidak ditemukan.');
        }

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

    public function publicGaleri()
    {
        $galeris = Galeri::orderBy('id', 'desc')->get();

        return view('public.galeri', compact('galeris'));
    }
}

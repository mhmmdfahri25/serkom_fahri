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

            'foto_file' => $request->kategori === 'foto' && !$id
                ? 'required|image|mimes:jpg,jpeg,png,webp|max:20480'
                : ($request->kategori === 'foto'
                    ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:20480'
                    : 'nullable'),

            'video_file' => $request->kategori === 'video' && !$id
                ? 'required|file|mimes:mp4,mov,avi,mkv|max:20480'
                : ($request->kategori === 'video'
                    ? 'nullable|file|mimes:mp4,mov,avi,mkv|max:20480'
                    : 'nullable'),
        ], [
            'judul.required' => 'Judul galeri wajib diisi.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'kategori.in' => 'Kategori harus berupa foto atau video.',
            'tanggal.required' => 'Tanggal wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',

            'foto_file.required' => 'Foto wajib dipilih.',
            'foto_file.image' => 'File harus berupa gambar.',
            'foto_file.mimes' => 'Foto harus berupa JPG, JPEG, PNG, atau WEBP.',
            'foto_file.max' => 'Ukuran foto maksimal 20 MB.',

            'video_file.required' => 'Video wajib dipilih.',
            'video_file.file' => 'File video tidak valid.',
            'video_file.mimes' => 'Video harus berupa MP4, MOV, AVI, atau MKV.',
            'video_file.max' => 'Ukuran video maksimal 20 MB.',
        ]);

        $kategoriLama = $galeri->kategori;

        $galeri->judul = $request->judul;
        $galeri->keterangan = $request->keterangan;
        $galeri->kategori = $request->kategori;
        $galeri->tanggal = $request->tanggal;

        /*
        |--------------------------------------------------------------------------
        | FOTO
        |--------------------------------------------------------------------------
        */
        if ($request->kategori === 'foto') {

            if ($request->hasFile('foto_file')) {

                if (
                    $galeri->foto &&
                    file_exists(public_path('uploads/galeri/' . $galeri->foto))
                ) {
                    unlink(public_path('uploads/galeri/' . $galeri->foto));
                }

                $file = $request->file('foto_file');

                $fileName = time() . '_' . $file->getClientOriginalName();

                $folder = public_path('uploads/galeri');

                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }

                $file->move($folder, $fileName);

                $galeri->foto = $fileName;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | VIDEO
        |--------------------------------------------------------------------------
        */
        if ($request->kategori === 'video') {

            if ($request->hasFile('video_file')) {

                if (
                    $galeri->foto &&
                    file_exists(public_path('uploads/galeri/' . $galeri->foto))
                ) {
                    unlink(public_path('uploads/galeri/' . $galeri->foto));
                }

                $file = $request->file('video_file');

                $fileName = time() . '_' . $file->getClientOriginalName();

                $folder = public_path('uploads/galeri');

                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }

                $file->move($folder, $fileName);

                $galeri->foto = $fileName;
            }
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

    /*
    |--------------------------------------------------------------------------
    | PUBLIC GALERI
    |--------------------------------------------------------------------------
    */

    public function publicGaleri()
    {
        $sekolah = \App\Models\ProfileSekolah::first();
        $galeri = Galeri::latest()->get();

        return view('public.galeri', compact('sekolah', 'galeri'));
    }

    public function publicShow($id)
    {
        $sekolah = \App\Models\ProfileSekolah::first();
        $galeri = Galeri::findOrFail($id);

        return view('public.galeri-detail', compact('sekolah', 'galeri'));
    }
}

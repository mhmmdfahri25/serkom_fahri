<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

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

        return view('admin.ekstrakulikuler.index', [
            'title' => 'Ekstrakulikuler',
            'ekstrakulikulers' => $ekstrakulikulers
        ]);
    }

    public function addEdit($id = null)
    {
        try {
            $ekstrakulikuler = $id
                ? Ekstrakulikuler::findOrFail(Crypt::decrypt($id))
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.ekstrakulikuler')
                ->with('error', 'Data ekstrakulikuler tidak ditemukan.');
        }

        return view('admin.ekstrakulikuler.form', [
            'title' => $ekstrakulikuler ? 'Edit Ekstrakulikuler' : 'Tambah Ekstrakulikuler',
            'ekstrakulikuler' => $ekstrakulikuler
        ]);
    }

    public function save(Request $request, $id = null)
    {
        if ($id) {
            try {
                $id = Crypt::decrypt($id);
                $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.ekstrakulikuler')
                    ->with('error', 'Data ekstrakulikuler tidak ditemukan.');
            }
        } else {
            $ekstrakulikuler = new Ekstrakulikuler();
        }

        $request->validate([
            'nama_ekstrakulikuler' => 'required|string|max:255',
            'pembina' => 'required|string|max:255',
            'jadwal_latihan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'nama_ekstrakulikuler.required' => 'Nama ekstrakulikuler wajib diisi.',
            'pembina.required' => 'Nama pembina wajib diisi.',
            'jadwal_latihan.required' => 'Jadwal latihan wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 5MB.',
        ]);

        $ekstrakulikuler->nama_ekstrakulikuler = $request->nama_ekstrakulikuler;
        $ekstrakulikuler->pembina = $request->pembina;
        $ekstrakulikuler->jadwal_latihan = $request->jadwal_latihan;
        $ekstrakulikuler->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            if ($ekstrakulikuler->foto && file_exists(public_path('uploads/ekstrakulikuler/' . $ekstrakulikuler->foto))) {
                unlink(public_path('uploads/ekstrakulikuler/' . $ekstrakulikuler->foto));
            }

            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            $folder = public_path('uploads/ekstrakulikuler');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $foto->move($folder, $namaFoto);
            $ekstrakulikuler->foto = $namaFoto;
        }

        $ekstrakulikuler->save();

        return redirect()
            ->route('admin.ekstrakulikuler')
            ->with(
                'success',
                $id
                    ? 'Data ekstrakulikuler berhasil diperbarui.'
                    : 'Data ekstrakulikuler berhasil ditambahkan.'
            );
    }

    public function show($id)
    {
        try {
            $ekstrakulikuler = Ekstrakulikuler::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.ekstrakulikuler')
                ->with('error', 'Data ekstrakulikuler tidak ditemukan.');
        }

        return view('admin.ekstrakulikuler.show', [
            'title' => 'Detail Ekstrakulikuler',
            'ekstrakulikuler' => $ekstrakulikuler
        ]);
    }

    public function destroy($id)
    {
        try {
            $ekstrakulikuler = Ekstrakulikuler::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.ekstrakulikuler')
                ->with('error', 'Data ekstrakulikuler tidak ditemukan.');
        }

        if ($ekstrakulikuler->foto && file_exists(public_path('uploads/ekstrakulikuler/' . $ekstrakulikuler->foto))) {
            unlink(public_path('uploads/ekstrakulikuler/' . $ekstrakulikuler->foto));
        }

        $ekstrakulikuler->delete();

        return redirect()
            ->route('admin.ekstrakulikuler')
            ->with('success', 'Data ekstrakulikuler berhasil dihapus.');
    }

    public function publicEkstrakulikuler()
    {
        $sekolah = \App\Models\ProfileSekolah::first();
        $ekstrakulikulers = Ekstrakulikuler::latest()->get();

        return view('public.ekstrakulikuler', compact('sekolah', 'ekstrakulikulers'));
    }

    public function publicShow($id)
    {
        $sekolah = \App\Models\ProfileSekolah::first();
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        return view('public.ekstrakulikuler-detail', compact('sekolah', 'ekstrakulikuler'));
    }
}

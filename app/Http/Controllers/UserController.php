<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id_user', 'desc')->get();

        return view('admin.user.index', compact('users'));
    }

    public function addEdit($id = null)
    {
        try {
            $user = $id
                ? User::where('id_user', Crypt::decrypt($id))->firstOrFail()
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Data user tidak ditemukan.');
        }

        return view('admin.user.form', compact('user'));
    }

    public function save(Request $request, $id = null)
    {
        $userId = null;

        if ($id) {
            try {
                $userId = Crypt::decrypt($id);
                $user = User::where('id_user', $userId)->firstOrFail();
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.user.index')
                    ->with('error', 'Data user tidak ditemukan.');
            }
        } else {
            $user = new User();

            // Membuat ID User otomatis
            $user->id_user = (string) Str::uuid();
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:user,email,' . ($userId ?? 'NULL') . ',id_user',
            'password' => $id ? 'nullable|min:6' : 'required|min:6',
            'role' => 'required|in:admin,operator',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan oleh user lain.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role yang dipilih tidak valid.',
        ]);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = $request->password;
        }

        $user->save();

        return redirect()
            ->route('admin.user.index')
            ->with(
                'success',
                $id
                    ? 'Data user berhasil diperbarui.'
                    : 'Data user berhasil ditambahkan.'
            );
    }

    public function show($id)
    {
        try {
            $user = User::where(
                'id_user',
                Crypt::decrypt($id)
            )->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Data user tidak ditemukan.');
        }

        return view('admin.user.show', compact('user'));
    }

    public function destroy($id)
    {
        try {
            $user = User::where(
                'id_user',
                Crypt::decrypt($id)
            )->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Data user tidak ditemukan.');
        }

        if ($user->id_user == auth()->user()->id_user) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'User yang sedang login tidak dapat dihapus.');
        }

        $user->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Data user berhasil dihapus.');
    }
}

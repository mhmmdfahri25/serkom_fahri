@extends('layouts.app')

@section('title', isset($user) ? 'Edit User' : 'Tambah User')

@section('content')

<div class="row">
    <div class="col-12">

        <div class="card card-outline card-primary shadow-sm">

            <div class="card-header">
                <h3 class="card-title mb-0">
                    {{ isset($user) ? 'Edit User' : 'Tambah User' }}
                </h3>
            </div>

            <form action="{{ route('admin.user.save', isset($user) ? Crypt::encrypt($user->id_user) : null) }}"
                  method="POST">

                @csrf

                <div class="card-body">

                    {{-- NAMA --}}
                    <div class="form-group mb-3">
                        <label for="nama">Nama</label>

                        <input type="text"
                               name="nama"
                               id="nama"
                               class="form-control @error('nama') is-invalid @enderror"
                               value="{{ old('nama', $user->nama ?? '') }}"
                               placeholder="Masukkan nama user">

                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    {{-- EMAIL --}}
                    <div class="form-group mb-3">
                        <label for="email">Email</label>

                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $user->email ?? '') }}"
                               placeholder="Masukkan email">

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    {{-- PASSWORD --}}
                    <div class="form-group mb-3">
                        <label for="password">
                            Password

                            @if(isset($user))
                                <small class="text-muted">
                                    (kosongkan jika tidak ingin mengubah)
                                </small>
                            @endif
                        </label>

                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Masukkan password">

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    {{-- ROLE --}}
                    <div class="form-group mb-3">
                        <label for="role">Role</label>

                        <select name="role"
                                id="role"
                                class="form-control @error('role') is-invalid @enderror">

                            <option value="">
                                -- Pilih Role --
                            </option>

                            <option value="admin"
                                {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                            <option value="operator"
                                {{ old('role', $user->role ?? '') == 'operator' ? 'selected' : '' }}>
                                Operator
                            </option>

                        </select>

                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>


                {{-- FOOTER --}}
                <div class="card-footer">

                    <a href="{{ route('admin.user.index') }}"
                       class="btn btn-secondary">

                        <i class="mdi mdi-arrow-left"></i>
                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="mdi mdi-content-save"></i>

                        {{ isset($user) ? 'Update' : 'Simpan' }}

                    </button>

                </div>

            </form>

        </div>

    </div>
</div>

@endsection

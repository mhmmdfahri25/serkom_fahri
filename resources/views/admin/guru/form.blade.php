@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">

        <div class="card">

            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-1">
                            {{ isset($guru) ? 'Edit Guru' : 'Tambah Guru' }}
                        </h4>

                        <p class="text-muted mb-0">
                            {{ isset($guru) ? 'Ubah data guru' : 'Tambahkan data guru baru' }}
                        </p>
                    </div>

                    <a href="{{ route('admin.guru.index') }}"
                       class="btn btn-light">
                        <i class="mdi mdi-arrow-left"></i>
                        Kembali
                    </a>
                </div>
            </div>

            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <div class="font-weight-bold mb-2">
                            <i class="mdi mdi-alert-circle-outline"></i>
                            Terjadi kesalahan:
                        </div>

                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                        <button type="button"
                                class="close"
                                data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif

                <form action="{{ route('admin.guru.save', isset($guru) ? Crypt::encrypt($guru->id) : null) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    {{-- Nama Guru --}}
                    <div class="form-group">
                        <label>
                            Nama Guru
                        </label>

                        <input type="text"
                               name="nama_guru"
                               class="form-control"
                               value="{{ old('nama_guru', $guru->nama_guru ?? '') }}"
                               placeholder="Masukkan nama guru"
                               required>
                    </div>

                    {{-- NIP --}}
                    <div class="form-group">
                        <label>
                            NIP
                        </label>

                        <input type="text"
                               name="nip"
                               class="form-control"
                               value="{{ old('nip', $guru->nip ?? '') }}"
                               placeholder="Masukkan NIP"
                               required>
                    </div>

                    {{-- Mata Pelajaran --}}
                    <div class="form-group">
                        <label>
                            Mata Pelajaran
                        </label>

                        <input type="text"
                               name="mata_pelajaran"
                               class="form-control"
                               value="{{ old('mata_pelajaran', $guru->mata_pelajaran ?? '') }}"
                               placeholder="Masukkan mata pelajaran"
                               required>
                    </div>

                    {{-- Foto Guru --}}
                    <div class="form-group">
                        <label>
                            Foto Guru
                        </label>

                        @if(isset($guru) && $guru->foto && file_exists(public_path('uploads/guru/' . $guru->foto)))
                            <div class="mb-3">
                                <img src="{{ asset('uploads/guru/' . $guru->foto) }}"
                                     alt="Foto {{ $guru->nama_guru }}"
                                     width="150"
                                     height="150"
                                     style="object-fit: cover; border-radius: 10px;">
                            </div>
                        @endif

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 5 MB.
                        </small>
                    </div>

                    {{-- Tombol --}}
                    <div class="mt-4">

                        <button type="submit"
                                class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i>

                            {{ isset($guru) ? 'Update' : 'Simpan' }}
                        </button>

                        <a href="{{ route('admin.guru.index') }}"
                           class="btn btn-light">
                            Batal
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection

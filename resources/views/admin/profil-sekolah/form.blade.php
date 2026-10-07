@extends('layouts.app')

@section('content')

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="mdi mdi-alert-circle-outline mr-2"></i>
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="mdi mdi-alert-circle-outline mr-2"></i>
        <strong>Terjadi kesalahan:</strong>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">

            {{-- HEADER --}}
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">

                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-school-outline text-primary mr-2"
                           style="font-size:26px;"></i>

                        <div>
                            <h4 class="card-title mb-1">
                                Edit Profile Sekolah
                            </h4>

                            <p class="text-muted mb-0">
                                Ubah informasi profile sekolah
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- FORM --}}
            <div class="card-body">

                <form action="{{ route('admin.profil-sekolah.save') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    {{-- NAMA SEKOLAH --}}
                    <div class="form-group">
                        <label>Nama Sekolah</label>

                        <input type="text"
                               name="nama_sekolah"
                               class="form-control"
                               value="{{ old('nama_sekolah', $profilSekolah->nama_sekolah) }}"
                               required>
                    </div>

                    {{-- KEPALA SEKOLAH --}}
                    <div class="form-group">
                        <label>Kepala Sekolah</label>

                        <input type="text"
                               name="kepala_sekolah"
                               class="form-control"
                               value="{{ old('kepala_sekolah', $profilSekolah->kepala_sekolah) }}"
                               required>
                    </div>

                    {{-- ALAMAT --}}
                    <div class="form-group">
                        <label>Alamat Sekolah</label>

                        <textarea name="alamat"
                                  class="form-control"
                                  rows="3"
                                  required>{{ old('alamat', $profilSekolah->alamat) }}</textarea>
                    </div>

                    {{-- KONTAK --}}
                    <div class="form-group">
                        <label>Kontak</label>

                        <input type="text"
                               name="kontak"
                               class="form-control"
                               value="{{ old('kontak', $profilSekolah->kontak) }}"
                               required>
                    </div>

                    {{-- TAHUN BERDIRI --}}
                    <div class="form-group">
                        <label>Tahun Berdiri</label>

                        <input type="number"
                               name="tahun_berdiri"
                               class="form-control"
                               value="{{ old('tahun_berdiri', $profilSekolah->tahun_berdiri) }}"
                               min="1900"
                               max="2100"
                               required>
                    </div>

                    {{-- VISI MISI --}}
                    <div class="form-group">
                        <label>Visi & Misi</label>

                        <textarea name="visi-misi"
                                  class="form-control"
                                  rows="8"
                                  required>{{ old('visi-misi', $profilSekolah->{'visi-misi'}) }}</textarea>
                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="form-group">
                        <label>Deskripsi Sekolah</label>

                        <textarea name="deskripsi"
                                  class="form-control"
                                  rows="5">{{ old('deskripsi', $profilSekolah->deskripsi) }}</textarea>
                    </div>

                    {{-- LOGO --}}
                    <div class="form-group">
                        <label>Logo Sekolah</label>

                        @if($profilSekolah->logo)
                            <div class="mb-3">
                                <img src="{{ asset('uploads/sekolah/' . $profilSekolah->logo) }}"
                                     alt="Logo Sekolah"
                                     width="120"
                                     class="img-thumbnail">
                            </div>
                        @endif

                        <input type="file"
                               name="logo"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp,.svg">

                        <small class="text-muted">
                            Format: JPG, JPEG, PNG, WEBP, SVG. Maksimal 5 MB.
                        </small>
                    </div>

                    {{-- FOTO --}}
                    <div class="form-group">
                        <label>Foto Sekolah</label>

                        @if($profilSekolah->foto)
                            <div class="mb-3">
                                <img src="{{ asset('uploads/sekolah/' . $profilSekolah->foto) }}"
                                     alt="Foto Sekolah"
                                     width="300"
                                     class="img-thumbnail">
                            </div>
                        @endif

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Format: JPG, JPEG, PNG, WEBP. Maksimal 5 MB.
                        </small>
                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-between mt-4">

                        <a href="{{ route('admin.profil-sekolah') }}"
                           class="btn btn-light">
                            <i class="mdi mdi-arrow-left mr-1"></i>
                            Batal
                        </a>

                        <button type="submit"
                                class="btn btn-gradient-primary btn btn-primary">
                            <i class="mdi mdi-content-save mr-1"></i>
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection

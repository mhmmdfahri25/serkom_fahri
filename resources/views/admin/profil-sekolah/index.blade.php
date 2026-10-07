@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="mdi mdi-check-circle-outline mr-2"></i>
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

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

{{-- HEADER PROFILE SEKOLAH --}}
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row align-items-center">

                    {{-- LOGO --}}
                    <div class="col-md-2 text-center mb-3 mb-md-0">
                        @if($profilSekolah && $profilSekolah->logo)
                            <img src="{{ asset('uploads/sekolah/' . $profilSekolah->logo) }}"
                                 alt="Logo Sekolah"
                                 class="img-fluid"
                                 width="120">
                        @else
                            <img src="{{ asset('assets/images/logo.svg') }}"
                                 alt="Logo Sekolah"
                                 class="img-fluid"
                                 width="120">
                        @endif
                    </div>

                    {{-- INFORMASI UTAMA --}}
                    <div class="col-md-7">
                        <h3 class="font-weight-bold mb-2">
                            {{ $profilSekolah->nama_sekolah ?? 'Nama Sekolah' }}
                        </h3>

                        <p class="text-muted mb-3">
                            <i class="mdi mdi-school-outline mr-1"></i>
                            Profil dan informasi sekolah
                        </p>

                        <span class="badge badge-gradient-primary">
                            <i class="mdi mdi-school mr-1"></i>
                            Sekolah
                        </span>
                    </div>

                    {{-- AKSI --}}
                    <div class="col-md-3 text-md-right mt-3 mt-md-0">
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.profil-sekolah.form') }}"
                               class="btn btn-primary btn-sm">
                                <i class="mdi mdi-pencil mr-1"></i>
                                Edit Profile
                            </a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- FOTO SEKOLAH + INFORMASI SEKOLAH --}}
<div class="row">

    {{-- FOTO SEKOLAH --}}
    <div class="col-lg-5 mb-4">
        <div class="card h-100">
            <div class="card-body">

                <h4 class="card-title mb-2">
                    <i class="mdi mdi-image-outline text-primary mr-2"></i>
                    Foto Sekolah
                </h4>

                <p class="text-muted mb-3">
                    Foto yang digunakan sebagai dokumentasi
                    profile sekolah.
                </p>

                @if($profilSekolah && $profilSekolah->foto)
                    <img src="{{ asset('uploads/sekolah/' . $profilSekolah->foto) }}"
                         alt="Foto Sekolah"
                         class="img-fluid rounded w-100">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                         style="height:300px;">
                        <div class="text-center text-muted">
                            <i class="mdi mdi-image-off-outline"
                               style="font-size:50px;"></i>
                            <p class="mb-0 mt-2">
                                Belum ada foto sekolah
                            </p>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    {{-- INFORMASI SEKOLAH --}}
    <div class="col-lg-7 mb-4">
        <div class="card h-100">
            <div class="card-body">

                <div class="d-flex align-items-center mb-4">
                    <i class="mdi mdi-information-outline text-primary mr-2"
                       style="font-size:24px;"></i>

                    <div>
                        <h4 class="card-title mb-1">
                            Informasi Sekolah
                        </h4>

                        <p class="text-muted mb-0">
                            Informasi dasar mengenai sekolah
                        </p>
                    </div>
                </div>

                <div class="row">

                    {{-- NAMA SEKOLAH --}}
                    <div class="col-md-6 mb-4">
                        <div class="d-flex">
                            <i class="mdi mdi-school-outline text-primary mr-3"
                               style="font-size:22px;"></i>

                            <div>
                                <small class="text-muted d-block">
                                    Nama Sekolah
                                </small>

                                <h6 class="font-weight-bold mb-0">
                                    {{ $profilSekolah->nama_sekolah ?? '-' }}
                                </h6>
                            </div>
                        </div>
                    </div>

                    {{-- KEPALA SEKOLAH --}}
                    <div class="col-md-6 mb-4">
                        <div class="d-flex">
                            <i class="mdi mdi-account-tie text-primary mr-3"
                               style="font-size:22px;"></i>

                            <div>
                                <small class="text-muted d-block">
                                    Kepala Sekolah
                                </small>

                                <h6 class="font-weight-bold mb-0">
                                    {{ $profilSekolah->kepala_sekolah ?? '-' }}
                                </h6>
                            </div>
                        </div>
                    </div>

                    {{-- TAHUN BERDIRI --}}
                    <div class="col-md-6 mb-4">
                        <div class="d-flex">
                            <i class="mdi mdi-calendar-outline text-primary mr-3"
                               style="font-size:22px;"></i>

                            <div>
                                <small class="text-muted d-block">
                                    Tahun Berdiri
                                </small>

                                <h6 class="font-weight-bold mb-0">
                                    {{ $profilSekolah->tahun_berdiri ?? '-' }}
                                </h6>
                            </div>
                        </div>
                    </div>

                    {{-- KONTAK --}}
                    <div class="col-md-6 mb-4">
                        <div class="d-flex">
                            <i class="mdi mdi-phone-outline text-primary mr-3"
                               style="font-size:22px;"></i>

                            <div>
                                <small class="text-muted d-block">
                                    Kontak
                                </small>

                                <h6 class="font-weight-bold mb-0">
                                    {{ $profilSekolah->kontak ?? '-' }}
                                </h6>
                            </div>
                        </div>
                    </div>

                    {{-- ALAMAT --}}
                    <div class="col-12">
                        <div class="d-flex">
                            <i class="mdi mdi-map-marker-outline text-primary mr-3"
                               style="font-size:22px;"></i>

                            <div>
                                <small class="text-muted d-block">
                                    Alamat Sekolah
                                </small>

                                <h6 class="font-weight-bold mb-0">
                                    {{ $profilSekolah->alamat ?? '-' }}
                                </h6>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

{{-- TENTANG SEKOLAH --}}
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">

                <h4 class="card-title mb-2">
                    <i class="mdi mdi-text-box-outline text-primary mr-2"></i>
                    Tentang Sekolah
                </h4>

                <p class="text-muted mb-3">
                    Deskripsi singkat mengenai sekolah
                </p>

                <div class="p-3 bg-light rounded">
                    <p class="text-muted mb-0">
                        {{ $profilSekolah->deskripsi ?? '-' }}
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- VISI & MISI --}}
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">

                <h4 class="card-title mb-2">
                    <i class="mdi mdi-eye-outline text-primary mr-2"></i>
                    Visi & Misi
                </h4>

                <p class="text-muted mb-3">
                    Visi dan misi sekolah
                </p>

                <div class="p-3 bg-light rounded">
                    <p class="text-muted mb-0"
                       style="white-space:pre-line;">
                        {{ $profilSekolah->{'visi-misi'} ?? '-' }}
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@extends('index')

@section('content')

{{-- =========================================================
     HEADER DASHBOARD
========================================================= --}}

<div class="row">

    <div class="col-12">

        <div class="card mb-4">

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-md-8">

                        <h3 class="font-weight-bold mb-2">

                            Selamat Datang,
                            {{ session('admin_nama') }}

                        </h3>

                        <p class="text-muted mb-0">

                            Selamat datang di Dashboard
                            SMAN 1 SAMRINDA.

                        </p>

                    </div>

                    <div class="col-md-4 text-md-right mt-3 mt-md-0">

                        <span class="badge badge-gradient-primary p-2">

                            <i class="mdi mdi-shield-account mr-1"></i>

                            Administrator

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     STATISTIK
========================================================= --}}

<div class="row">

    {{-- GURU --}}

    <div class="col-xl-3 col-md-6 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <p class="text-muted mb-2">
                            Total Guru
                        </p>

                        <h3 class="font-weight-bold mb-0">

                            {{ $jumlahGuru }}

                        </h3>

                    </div>

                    <div class="p-3 rounded bg-primary">

                        <i class="mdi mdi-account-tie text-white"
                           style="font-size: 24px;"></i>

                    </div>

                </div>

                <div class="mt-3">

                    <a href="{{ route('admin.guru') }}"
                       class="text-primary">

                        Kelola Guru
                        <i class="mdi mdi-arrow-right ml-1"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- SISWA --}}

    <div class="col-xl-3 col-md-6 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <p class="text-muted mb-2">
                            Total Siswa
                        </p>

                        <h3 class="font-weight-bold mb-0">

                            {{ $jumlahSiswa }}

                        </h3>

                    </div>

                    <div class="p-3 rounded bg-success">

                        <i class="mdi mdi-account-group text-white"
                           style="font-size: 24px;"></i>

                    </div>

                </div>

                <div class="mt-3">

                    <a href="{{ route('admin.siswa') }}"
                       class="text-success">

                        Kelola Siswa
                        <i class="mdi mdi-arrow-right ml-1"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- BERITA --}}

    <div class="col-xl-3 col-md-6 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <p class="text-muted mb-2">
                            Total Berita
                        </p>

                        <h3 class="font-weight-bold mb-0">

                            {{ $jumlahBerita }}

                        </h3>

                    </div>

                    <div class="p-3 rounded bg-warning">

                        <i class="mdi mdi-newspaper text-white"
                           style="font-size: 24px;"></i>

                    </div>

                </div>

                <div class="mt-3">

                    <a href="{{ route('admin.berita') }}"
                       class="text-warning">

                        Kelola Berita
                        <i class="mdi mdi-arrow-right ml-1"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- EKSTRAKULIKULER --}}

    <div class="col-xl-3 col-md-6 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <p class="text-muted mb-2">
                            Ekstrakulikuler
                        </p>

                        <h3 class="font-weight-bold mb-0">

                            {{ $jumlahEkstrakulikuler }}

                        </h3>

                    </div>

                    <div class="p-3 rounded bg-danger">

                        <i class="mdi mdi-soccer text-white"
                           style="font-size: 24px;"></i>

                    </div>

                </div>

                <div class="mt-3">

                    {{-- ROUTE SUDAH DIPERBAIKI --}}

                    <a href="{{ route('admin.ekstrakulikuler') }}"
                       class="text-danger">

                        Kelola Ekstrakulikuler
                        <i class="mdi mdi-arrow-right ml-1"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     PROFILE SEKOLAH + GALERI
========================================================= --}}

<div class="row">

    {{-- PROFILE SEKOLAH --}}

    <div class="col-lg-8 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>

                        <h4 class="card-title mb-1">

                            <i class="mdi mdi-school text-primary mr-2"></i>

                            Profile Sekolah

                        </h4>

                        <p class="text-muted mb-0">

                            Informasi singkat sekolah

                        </p>

                    </div>

                    <a href="{{ route('admin.profile') }}"
                       class="btn btn-sm btn-outline-primary">

                        Lihat Profile

                    </a>

                </div>


                @if($sekolah)

                    <div class="row align-items-center">

                        {{-- LOGO --}}

                        <div class="col-md-3 text-center mb-3 mb-md-0">

                            @if($sekolah->logo)

                                <img
                                    src="{{ asset('uploads/sekolah/' . $sekolah->logo) }}"
                                    alt="Logo Sekolah"
                                    class="img-fluid"
                                    width="110"
                                >

                            @else

                                <img
                                    src="{{ asset('assets/images/logosma5.png') }}"
                                    alt="Logo Sekolah"
                                    class="img-fluid"
                                    width="110"
                                >

                            @endif

                        </div>


                        {{-- INFORMASI --}}

                        <div class="col-md-9">

                            <h4 class="font-weight-bold">

                                {{ $sekolah->nama_sekolah }}

                            </h4>

                            <p class="text-muted mb-3">

                                <i class="mdi mdi-account-tie mr-1"></i>

                                Kepala Sekolah:
                                {{ $sekolah->kepala_sekolah }}

                            </p>

                            <p class="text-muted mb-2">

                                <i class="mdi mdi-map-marker-outline mr-1"></i>

                                {{ $sekolah->alamat }}

                            </p>

                            <p class="text-muted mb-0">

                                <i class="mdi mdi-phone-outline mr-1"></i>

                                {{ $sekolah->kontak }}

                            </p>

                        </div>

                    </div>

                @else

                    <div class="text-center py-4">

                        <i class="mdi mdi-school-outline text-muted"
                           style="font-size: 45px;"></i>

                        <p class="text-muted mt-2">

                            Data profile sekolah belum tersedia.

                        </p>

                        <a href="{{ route('admin.profile') }}"
                           class="btn btn-gradient-primary">

                            Tambah Profile

                        </a>

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- GALERI --}}

    <div class="col-lg-4 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title mb-1">

                    <i class="mdi mdi-image-multiple text-primary mr-2"></i>

                    Galeri

                </h4>

                <p class="text-muted">

                    Dokumentasi sekolah

                </p>

                <div class="text-center py-3">

                    <i class="mdi mdi-image-multiple-outline text-primary"
                       style="font-size: 55px;"></i>

                    <h2 class="font-weight-bold mt-3">

                        {{ $jumlahGaleri }}

                    </h2>

                    <p class="text-muted">

                        Koleksi Galeri

                    </p>

                    <a href="{{ route('admin.galeri') }}"
                       class="btn btn-sm btn-gradient-primary">

                        Lihat Galeri

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     MENU CEPAT
========================================================= --}}

<div class="row">

    <div class="col-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title mb-1">

                    <i class="mdi mdi-lightning-bolt text-primary mr-2"></i>

                    Akses Cepat

                </h4>

                <p class="text-muted mb-4">

                    Akses menu administrasi sekolah

                </p>


                <div class="row">

                    <div class="col-lg-3 col-md-6 mb-3">

                        <a href="{{ route('admin.guru') }}"
                           class="btn btn-outline-primary btn-block">

                            <i class="mdi mdi-account-tie mr-1"></i>

                            Kelola Guru

                        </a>

                    </div>


                    <div class="col-lg-3 col-md-6 mb-3">

                        <a href="{{ route('admin.siswa') }}"
                           class="btn btn-outline-success btn-block">

                            <i class="mdi mdi-account-group mr-1"></i>

                            Kelola Siswa

                        </a>

                    </div>


                    <div class="col-lg-3 col-md-6 mb-3">

                        <a href="{{ route('admin.berita') }}"
                           class="btn btn-outline-warning btn-block">

                            <i class="mdi mdi-newspaper mr-1"></i>

                            Kelola Berita

                        </a>

                    </div>


                    <div class="col-lg-3 col-md-6 mb-3">

                        <a href="{{ route('admin.galeri') }}"
                           class="btn btn-outline-danger btn-block">

                            <i class="mdi mdi-image-multiple mr-1"></i>

                            Kelola Galeri

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     BERITA TERBARU
========================================================= --}}

<div class="row">

    <div class="col-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>

                        <h4 class="card-title mb-1">

                            <i class="mdi mdi-newspaper-variant text-primary mr-2"></i>

                            Berita Terbaru

                        </h4>

                        <p class="text-muted mb-0">

                            Informasi terbaru sekolah

                        </p>

                    </div>

                    <a href="{{ route('admin.berita') }}"
                       class="btn btn-sm btn-outline-primary">

                        Semua Berita

                    </a>

                </div>


                @if($beritaTerbaru->count() > 0)

                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>

                                <tr>

                                    <th>
                                        #
                                    </th>

                                    <th>
                                        Judul Berita
                                    </th>

                                    <th>
                                        Tanggal
                                    </th>

                                    <th class="text-right">
                                        Status
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach($beritaTerbaru as $index => $berita)

                                    <tr>

                                        <td>
                                            {{ $index + 1 }}
                                        </td>

                                        <td>

                                            <strong>

                                                {{ $berita->judul }}

                                            </strong>

                                        </td>

                                        <td>

                                            {{ $berita->created_at
                                                ? $berita->created_at->format('d M Y')
                                                : '-' }}

                                        </td>

                                        <td class="text-right">

                                            <span class="badge badge-success">

                                                Aktif

                                            </span>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="text-center py-4">

                        <i class="mdi mdi-newspaper-variant-outline text-muted"
                           style="font-size: 45px;"></i>

                        <p class="text-muted mt-2 mb-0">

                            Belum ada berita.

                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection

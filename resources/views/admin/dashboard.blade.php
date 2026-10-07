@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

{{-- HEADER --}}
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body py-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <span class="badge badge-primary mb-2">
                            <i class="mdi mdi-view-dashboard mr-1"></i>
                            ADMIN PANEL
                        </span>

                        <h3 class="font-weight-bold mb-1">
                            Dashboard
                        </h3>

                        <p class="text-muted mb-0">
                            Selamat datang di panel administrasi
                            <strong>SMAN 1 SAMARINDA</strong>.
                        </p>
                    </div>

                    <div class="mt-3 mt-md-0">
                        <a href="{{ route('public.dashboard') }}"
                           target="_blank"
                           class="btn btn-outline-primary">
                            <i class="mdi mdi-web mr-1"></i>
                            Lihat Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- STATISTIK UTAMA --}}
<div class="row">

    {{-- GURU --}}
    <div class="col-md-6 col-xl-3 grid-margin stretch-card">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-muted mb-2">
                            Total Guru
                        </p>

                        <h2 class="font-weight-bold mb-1">
                            {{ $jumlahGuru }}
                        </h2>

                        <small class="text-primary">
                            Data tenaga pengajar
                        </small>
                    </div>

                    <div class="icon icon-box-primary">
                        <i class="mdi mdi-account-tie mdi-36px"></i>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('admin.guru.index') }}"
                       class="btn btn-sm btn-outline-primary">
                        Kelola Guru
                        <i class="mdi mdi-arrow-right ml-1"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>


    {{-- SISWA --}}
    <div class="col-md-6 col-xl-3 grid-margin stretch-card">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-muted mb-2">
                            Total Siswa
                        </p>

                        <h2 class="font-weight-bold mb-1">
                            {{ $jumlahSiswa }}
                        </h2>

                        <small class="text-info">
                            Data peserta didik
                        </small>
                    </div>

                    <div class="icon icon-box-info">
                        <i class="mdi mdi-account-group mdi-36px"></i>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('admin.siswa.index') }}"
                       class="btn btn-sm btn-outline-info">
                        Kelola Siswa
                        <i class="mdi mdi-arrow-right ml-1"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>


    {{-- BERITA --}}
    <div class="col-md-6 col-xl-3 grid-margin stretch-card">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-muted mb-2">
                            Total Berita
                        </p>

                        <h2 class="font-weight-bold mb-1">
                            {{ $jumlahBerita }}
                        </h2>

                        <small class="text-warning">
                            Publikasi sekolah
                        </small>
                    </div>

                    <div class="icon icon-box-warning">
                        <i class="mdi mdi-newspaper mdi-36px"></i>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('admin.berita') }}"
                       class="btn btn-sm btn-outline-warning">
                        Kelola Berita
                        <i class="mdi mdi-arrow-right ml-1"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>


    {{-- GALERI --}}
    <div class="col-md-6 col-xl-3 grid-margin stretch-card">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-muted mb-2">
                            Total Galeri
                        </p>

                        <h2 class="font-weight-bold mb-1">
                            {{ $jumlahGaleri }}
                        </h2>

                        <small class="text-danger">
                            Dokumentasi sekolah
                        </small>
                    </div>

                    <div class="icon icon-box-danger">
                        <i class="mdi mdi-image-multiple mdi-36px"></i>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('admin.galeri') }}"
                       class="btn btn-sm btn-outline-danger">
                        Kelola Galeri
                        <i class="mdi mdi-arrow-right ml-1"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>

</div>


{{-- STATISTIK TAMBAHAN --}}
<div class="row">

    {{-- EKSTRAKULIKULER --}}
    <div class="col-md-6 col-xl-6 grid-margin stretch-card">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">
                            Ekstrakulikuler
                        </p>

                        <h3 class="font-weight-bold mb-1">
                            {{ $jumlahEkstrakulikuler }}
                        </h3>

                        <small class="text-success">
                            Kegiatan pengembangan siswa
                        </small>
                    </div>

                    <div class="icon icon-box-success">
                        <i class="mdi mdi-run mdi-36px"></i>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="{{ route('admin.ekstrakulikuler') }}"
                       class="btn btn-sm btn-outline-success">
                        Kelola Ekstrakulikuler
                        <i class="mdi mdi-arrow-right ml-1"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>


    {{-- PROFIL SEKOLAH --}}
    <div class="col-md-6 col-xl-6 grid-margin stretch-card">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="text-muted mb-1">
                            Profil Sekolah
                        </p>

                        <h3 class="font-weight-bold mb-1">
                            {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}
                        </h3>

                        <small class="text-primary">
                            Informasi identitas sekolah
                        </small>
                    </div>

                    <div class="text-center ml-3">

                        @if($sekolah && $sekolah->logo)

                            <img src="{{ asset('uploads/sekolah/' . $sekolah->logo) }}"
                                 alt="Logo Sekolah"
                                 style="width:95px;height:95px;object-fit:contain;">

                        @else

                            <img src="{{ asset('assets/images/logosma5.png') }}"
                                 alt="Logo Sekolah"
                                 style="width:95px;height:95px;object-fit:contain;">

                        @endif

                    </div>

                </div>

                <div class="mt-3">
                    <a href="{{ route('admin.profil-sekolah') }}"
                       class="btn btn-sm btn-outline-primary">
                        Kelola Profil
                        <i class="mdi mdi-arrow-right ml-1"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>

</div>


{{-- BERITA TERBARU --}}
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div>
                        <h4 class="card-title mb-1">
                            Berita Terbaru
                        </h4>

                        <small class="text-muted">
                            Informasi terbaru sekolah
                        </small>
                    </div>

                    <a href="{{ route('admin.berita') }}"
                       class="btn btn-sm btn-outline-primary">
                        Semua
                    </a>

                </div>


                @if($beritaTerbaru && $beritaTerbaru->count() > 0)

                    @foreach($beritaTerbaru as $berita)

                        <div class="d-flex align-items-center border-bottom py-2">

                            <div class="mr-3 flex-shrink-0">

                                @if($berita->foto)

                                    <img src="{{ asset('uploads/berita/' . $berita->foto) }}"
                                         alt="{{ $berita->judul }}"
                                         class="rounded"
                                         style="width:65px;height:50px;object-fit:cover;">

                                @else

                                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                         style="width:65px;height:50px;">

                                        <i class="mdi mdi-newspaper text-muted"></i>

                                    </div>

                                @endif

                            </div>


                            <div class="flex-grow-1 overflow-hidden">

                                <h6 class="font-weight-bold mb-1 text-truncate">
                                    {{ $berita->judul }}
                                </h6>

                                <p class="text-muted small mb-0 text-truncate">
                                    {{ strip_tags($berita->isi) }}
                                </p>

                            </div>


                            <div class="ml-3 text-right flex-shrink-0">

                                <small class="text-muted">
                                    <i class="mdi mdi-calendar-outline"></i>
                                    {{ $berita->tanggal }}
                                </small>

                            </div>

                        </div>

                    @endforeach

                @else

                    <div class="text-center py-4">

                        <i class="mdi mdi-newspaper-outline mdi-36px text-muted"></i>

                        <p class="text-muted mb-0 mt-2">
                            Belum ada berita.
                        </p>

                    </div>

                @endif

            </div>
        </div>
    </div>
</div>

@endsection

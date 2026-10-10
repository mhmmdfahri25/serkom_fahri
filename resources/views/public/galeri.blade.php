```blade
@extends('public.dashboard')

@section('title', 'Galeri - ' . ($sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA'))

@section('content')

<style>
    /* =========================
       HALAMAN GALERI
    ========================= */

    .public-page {
        padding: 80px 0;
        background: #f8fafc;
        min-height: 80vh;
    }

    .back-home {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 30px;
        padding: 11px 20px;
        border-radius: 10px;
        background: #fff;
        color: #2563eb;
        border: 1px solid #2563eb;
        text-decoration: none;
        font-weight: 700;
        transition: .3s;
    }

    .back-home:hover {
        background: #2563eb;
        color: #fff;
        transform: translateY(-2px);
    }

    .page-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .page-header .badge-title {
        display: inline-block;
        padding: 8px 16px;
        margin-bottom: 12px;
        border-radius: 30px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 13px;
        font-weight: 700;
    }

    .page-header h1 {
        color: #172554;
        font-size: 42px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .page-header p {
        max-width: 700px;
        margin: auto;
        color: #64748b;
        line-height: 1.8;
    }

    .gallery-public-card {
        position: relative;
        overflow: hidden;
        height: 320px;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
    }

    .gallery-public-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .4s;
    }

    .gallery-public-card:hover img {
        transform: scale(1.06);
    }

    .gallery-public-overlay {
        position: absolute;
        inset: auto 0 0;
        padding: 60px 22px 22px;
        background: linear-gradient(transparent, rgba(0, 0, 0, .85));
        color: #fff;
    }

    .gallery-public-overlay h4 {
        font-weight: 800;
        margin-bottom: 5px;
        overflow-wrap: anywhere;
    }

    .gallery-public-overlay p {
        margin: 0 0 12px;
        color: rgba(255, 255, 255, .8);
        font-size: 14px;
        overflow-wrap: anywhere;
    }

    .detail-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 9px 16px;
        border-radius: 8px;
        background: #2563eb;
        color: #fff;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        transition: .3s;
    }

    .detail-btn:hover {
        background: #1d4ed8;
        color: #fff;
    }

    /* =========================
       FOOTER SEKOLAH
    ========================= */

    .school-footer {
        width: 100%;
        padding: 65px 0 0;
        background: #0f172a;
        color: #94a9c5;
    }

    .school-footer .container {
        max-width: 1590px;
    }

    .school-footer .footer-content {
        padding-bottom: 55px;
    }

    .school-footer .footer-brand {
        display: flex;
        align-items: center;
        gap: 22px;
        margin-bottom: 24px;
    }

    .school-footer .footer-logo {
        width: 73px;
        height: 80px;
        object-fit: contain;
        flex-shrink: 0;
    }

    .school-footer .footer-brand h4 {
        margin: 0 0 8px;
        color: #fff;
        font-size: 21px;
        font-weight: 800;
    }

    .school-footer .footer-brand p {
        margin: 0;
        color: #94a9c5;
        font-size: 16px;
    }

    .school-footer .footer-description {
        margin-bottom: 22px;
        color: #94a9c5;
        font-size: 16px;
        line-height: 1.9;
    }

    .school-footer .footer-social {
        display: flex;
        gap: 11px;
    }

    .school-footer .footer-social a {
        width: 46px;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #202b41;
        border-radius: 13px;
        color: #fff;
        font-size: 21px;
        text-decoration: none;
        transition: .2s ease;
    }

    .school-footer .footer-social a:hover {
        background: #2563eb;
        color: #fff;
        transform: translateY(-2px);
    }

    .school-footer .footer-menu h5,
    .school-footer .footer-information h5 {
        color: #fff;
        font-size: 17px;
        font-weight: 750;
        margin-bottom: 22px;
    }

    .school-footer .footer-menu ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .school-footer .footer-menu li {
        margin-bottom: 15px;
    }

    .school-footer .footer-menu a {
        color: #94a9c5;
        font-size: 15px;
        text-decoration: none;
        transition: .2s ease;
    }

    .school-footer .footer-menu a:hover {
        color: #fff;
        padding-left: 4px;
    }

    .school-footer .footer-information-item {
        display: flex;
        align-items: flex-start;
        gap: 13px;
        margin-bottom: 18px;
        color: #94a9c5;
        font-size: 15px;
        line-height: 1.8;
    }

    .school-footer .footer-information-item i {
        color: #60a5fa;
        font-size: 17px;
        margin-top: 3px;
        flex-shrink: 0;
    }

    .school-footer .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, .12);
        padding: 20px 0;
    }

    .school-footer .footer-bottom p {
        margin: 0;
        color: #94a9c5;
        font-size: 13px;
    }

    /* RESPONSIVE */

    @media (max-width: 991px) {
        .public-page {
            padding: 50px 0;
        }

        .page-header h1 {
            font-size: 32px;
        }

        .school-footer {
            padding-top: 45px;
        }

        .school-footer .footer-content > div {
            margin-bottom: 32px;
        }

        .school-footer .footer-content {
            padding-bottom: 20px;
        }
    }

    @media (max-width: 576px) {
        .public-page {
            padding: 35px 0;
        }

        .page-header h1 {
            font-size: 28px;
        }

        .gallery-public-card {
            height: 280px;
        }

        .school-footer {
            padding-top: 35px;
        }

        .school-footer .footer-brand {
            gap: 15px;
        }

        .school-footer .footer-logo {
            width: 58px;
            height: 65px;
        }

        .school-footer .footer-brand h4 {
            font-size: 17px;
        }

        .school-footer .footer-description {
            font-size: 14px;
        }
    }
</style>

@php
    $namaSekolah = $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA';

    $deskripsiSekolah = $sekolah->deskripsi
        ?? 'SMA Negeri 1 Samarinda mendorong pendidikan berkualitas untuk semua peserta didik.';
@endphp

{{-- =========================
     DAFTAR GALERI
========================= --}}

<section class="public-page">
    <div class="container">

        <a href="{{ route('public.dashboard') }}" class="back-home">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Landing Page
        </a>

        <div class="page-header">
            <span class="badge-title">Dokumentasi</span>

            <h1>Galeri Sekolah</h1>

            <p>
                Dokumentasi kegiatan dan aktivitas {{ $namaSekolah }}.
            </p>
        </div>

        <div class="row g-4">

            @forelse($galeri as $item)

                <div class="col-md-6 col-lg-4">

                    <div class="gallery-public-card">

                        @if(
                            $item->foto &&
                            file_exists(public_path('uploads/galeri/' . $item->foto))
                        )
                            <img
                                src="{{ asset('uploads/galeri/' . $item->foto) }}"
                                alt="{{ $item->judul }}">
                        @else
                            <img
                                src="{{ asset('assets/images/logosman1samarinda.png') }}"
                                alt="{{ $item->judul }}">
                        @endif

                        <div class="gallery-public-overlay">

                            <h4>{{ $item->judul }}</h4>

                            @if($item->keterangan)
                                <p>{{ $item->keterangan }}</p>
                            @endif

                            <a
                                href="{{ route('public.galeri.show', $item->id) }}"
                                class="detail-btn">
                                <i class="bi bi-eye"></i>
                                Detail
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">
                    <div class="alert alert-light text-center">
                        Belum ada galeri.
                    </div>
                </div>

            @endforelse

        </div>

    </div>
</section>

{{-- =========================
     FOOTER SEKOLAH
========================= --}}

<footer class="school-footer">
    <div class="container">

        <div class="row footer-content">

            {{-- IDENTITAS SEKOLAH --}}

            <div class="col-lg-5 col-md-6 footer-school">

                <div class="footer-brand">

                    @if(
                        isset($sekolah) &&
                        $sekolah->logo &&
                        file_exists(public_path('uploads/sekolah/' . $sekolah->logo))
                    )
                        <img
                            src="{{ asset('uploads/sekolah/' . $sekolah->logo) }}"
                            alt="Logo Sekolah"
                            class="footer-logo">
                    @else
                        <img
                            src="{{ asset('assets/images/logosman1samarinda.png') }}"
                            alt="Logo Sekolah"
                            class="footer-logo">
                    @endif

                    <div>
                        <h4>{{ $namaSekolah }}</h4>
                        <p>Situs Resmi Sekolah</p>
                    </div>

                </div>

                <p class="footer-description">
                    {{ $deskripsiSekolah }}
                </p>

                <div class="footer-social">

                    <a
                        href="{{ $sekolah->facebook ?? '#' }}"
                        aria-label="Facebook"
                        target="_blank"
                        rel="noopener noreferrer">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a
                        href="{{ $sekolah->instagram ?? '#' }}"
                        aria-label="Instagram"
                        target="_blank"
                        rel="noopener noreferrer">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a
                        href="{{ $sekolah->youtube ?? '#' }}"
                        aria-label="YouTube"
                        target="_blank"
                        rel="noopener noreferrer">
                        <i class="bi bi-youtube"></i>
                    </a>

                </div>

            </div>

            {{-- MENU --}}

            <div class="col-lg-3 col-md-6 footer-menu">

                <h5>Menu</h5>

                <ul>
                    <li>
                        <a href="{{ route('public.dashboard') }}">Beranda</a>
                    </li>

                    <li>
                        <a href="{{ url('/profil') }}">Profil</a>
                    </li>

                    <li>
                        <a href="{{ url('/guru') }}">Guru</a>
                    </li>

                    <li>
                        <a href="{{ url('/siswa') }}">Siswa</a>
                    </li>

                    <li>
                        <a href="{{ url('/berita') }}">Berita</a>
                    </li>

                    <li>
                        <a href="{{ url('/galeri') }}">Galeri</a>
                    </li>

                    <li>
                        <a href="{{ url('/ekstrakulikuler') }}">Ekstrakurikuler</a>
                    </li>
                </ul>

            </div>

            {{-- INFORMASI SEKOLAH --}}

            <div class="col-lg-4 col-md-12 footer-information">

                <h5>Informasi Sekolah</h5>

                <div class="footer-information-item">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>{{ $sekolah->alamat ?? '-' }}</span>
                </div>

                <div class="footer-information-item">
                    <i class="bi bi-telephone-fill"></i>
                    <span>{{ $sekolah->kontak ?? '-' }}</span>
                </div>

                <div class="footer-information-item">
                    <i class="bi bi-building"></i>
                    <span>{{ $namaSekolah }}</span>
                </div>

            </div>

        </div>

        {{-- COPYRIGHT --}}

        <div class="footer-bottom">
            <p>
                &copy; {{ date('Y') }} {{ $namaSekolah }}.
                All rights reserved.
            </p>
        </div>

    </div>
</footer>

@endsection

```blade
@extends('public.dashboard')

@section('title', 'Guru - ' . ($sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA'))

@section('content')

<style>
    /* =========================
       HALAMAN GURU
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

    .guru-public-card {
        height: 100%;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .06);
        transition: .3s;
    }

    .guru-public-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 40px rgba(15, 23, 42, .10);
    }

    .guru-public-photo {
        width: 100%;
        height: auto;
        display: block;
    }

    .guru-public-content {
        padding: 25px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .guru-public-content h4 {
        color: #172554;
        font-weight: 800;
        margin-bottom: 15px;
        min-height: 58px;
        display: flex;
        align-items: flex-start;
        overflow-wrap: anywhere;
    }

    .guru-info {
        display: flex;
        gap: 9px;
        margin-bottom: 9px;
        color: #64748b;
        font-size: 14px;
    }

    .guru-info i {
        color: #2563eb;
        flex-shrink: 0;
    }

    .detail-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        align-self: flex-start;
        margin-top: auto;
        padding: 10px 18px;
        border-radius: 9px;
        background: #2563eb;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
        transition: .3s;
    }

    .detail-btn:hover {
        background: #1d4ed8;
        color: #fff;
        transform: translateY(-2px);
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

        .guru-public-content {
            padding: 20px;
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
     DAFTAR GURU
========================= --}}

<section class="public-page">
    <div class="container">

        <a href="{{ route('public.dashboard') }}" class="back-home">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Landing Page
        </a>

        <div class="page-header">
            <span class="badge-title">
                Tenaga Pendidik
            </span>

            <h1>Guru {{ $namaSekolah }}</h1>

            <p>
                Kenali tenaga pendidik yang berperan dalam memberikan
                pendidikan terbaik kepada seluruh peserta didik.
            </p>
        </div>

        <div class="row g-4">

            @forelse($guru as $item)

                <div class="col-md-6 col-lg-4 d-flex">

                    <div class="guru-public-card w-100">

                        @if(
                            $item->foto &&
                            file_exists(public_path('uploads/guru/' . $item->foto))
                        )
                            <img
                                src="{{ asset('uploads/guru/' . $item->foto) }}"
                                class="guru-public-photo"
                                alt="{{ $item->nama_guru }}">
                        @else
                            <img
                                src="{{ asset('assets/images/logosman1samarinda.png') }}"
                                class="guru-public-photo"
                                alt="{{ $item->nama_guru }}">
                        @endif

                        <div class="guru-public-content">

                            <h4>{{ $item->nama_guru }}</h4>

                            <div class="guru-info">
                                <i class="bi bi-person-badge"></i>
                                <span>NIP: {{ $item->nip ?? '-' }}</span>
                            </div>

                            <div class="guru-info">
                                <i class="bi bi-book"></i>
                                <span>{{ $item->mata_pelajaran ?? '-' }}</span>
                            </div>

                            <a
                                href="{{ route('public.guru.show', $item->id) }}"
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
                        Data guru belum tersedia.
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

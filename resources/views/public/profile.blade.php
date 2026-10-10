
@extends('public.dashboard')

@section('title', 'Profil Sekolah')

@section('content')

<style>
    /* =========================
       HALAMAN PROFIL SEKOLAH
    ========================= */

    .profile-page {
        padding: 70px 0;
        background: #f8fafc;
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

    .profile-page .section-title {
        text-align: center;
        margin-bottom: 45px;
    }

    .profile-page .badge-title {
        display: inline-block;
        padding: 12px 25px;
        border-radius: 50px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 22px;
        font-weight: 600;
    }

    .profile-page .profile-image {
        display: block;
        width: 100%;
        height: 390px;
        object-fit: cover;
        border-radius: 18px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, .12);
    }

    .profile-page .profile-content h2 {
        margin-bottom: 18px;
        color: #172554;
        font-size: 32px;
        font-weight: 800;
        line-height: 1.4;
    }

    .profile-page .profile-description {
        margin-bottom: 22px;
        color: #64748b;
        font-size: 15px;
        line-height: 1.9;
    }

    .profile-page .profile-info {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
        margin-top: 22px;
    }

    .profile-page .profile-info-item {
        display: flex;
        flex-direction: column;
        gap: 7px;
        min-width: 0;
        padding: 17px 16px;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 13px;
        transition: .3s ease;
    }

    .profile-page .profile-info-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(15, 23, 42, .06);
    }

    .profile-page .profile-info-item small {
        color: #64748b;
        font-size: 13px;
    }

    .profile-page .profile-info-item small i {
        margin-right: 5px;
        color: #64748b;
    }

    .profile-page .profile-info-item strong {
        color: #172554;
        font-size: 14px;
        line-height: 1.7;
        overflow-wrap: anywhere;
    }

    .profile-page .btn-profile-detail {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 15px;
        border-radius: 6px;
        background: #0d6efd;
        color: #fff;
        font-size: 14px;
        text-decoration: none;
        transition: .2s ease;
    }

    .profile-page .btn-profile-detail:hover {
        background: #0b5ed7;
        color: #fff;
    }

    /* VISI MISI */

    .profile-page .vision-section {
        margin-top: 65px;
    }

    .profile-page .vision-card {
        height: 100%;
        padding: 28px;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(15, 23, 42, .04);
    }

    .profile-page .vision-card h3 {
        margin-bottom: 17px;
        color: #172554;
        font-size: 23px;
        font-weight: 700;
    }

    .profile-page .vision-content {
        color: #64748b;
        font-size: 15px;
        line-height: 1.9;
        overflow-wrap: anywhere;
    }

    /* FOOTER */

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
        display: flex;
        align-items: center;
        justify-content: center;
        width: 46px;
        height: 46px;
        border-radius: 13px;
        background: #202b41;
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
        margin-bottom: 22px;
        color: #fff;
        font-size: 17px;
        font-weight: 750;
    }

    .school-footer .footer-menu ul {
        margin: 0;
        padding: 0;
        list-style: none;
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
        flex-shrink: 0;
        margin-top: 3px;
        color: #60a5fa;
        font-size: 17px;
    }

    .school-footer .footer-bottom {
        padding: 20px 0;
        border-top: 1px solid rgba(255, 255, 255, .12);
    }

    .school-footer .footer-bottom p {
        margin: 0;
        color: #94a9c5;
        font-size: 13px;
    }

    /* RESPONSIVE */

    @media (max-width: 991px) {
        .profile-page {
            padding: 50px 0;
        }

        .profile-page .profile-image {
            height: 350px;
            margin-bottom: 25px;
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
        .profile-page {
            padding: 35px 0;
        }

        .profile-page .badge-title {
            padding: 10px 20px;
            font-size: 19px;
        }

        .profile-page .profile-image {
            height: 260px;
        }

        .profile-page .profile-content h2 {
            font-size: 25px;
        }

        .profile-page .profile-info {
            grid-template-columns: 1fr;
        }

        .profile-page .vision-card {
            padding: 22px;
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
    $deskripsi = $sekolah->deskripsi ?? 'SMA Negeri 1 Samarinda merupakan sekolah yang berkomitmen memberikan pendidikan berkualitas bagi seluruh peserta didik.';
@endphp

{{-- =========================
     PROFIL SEKOLAH
========================= --}}

<section class="profile-page">
    <div class="container">

          <a href="{{ route('public.dashboard') }}" class="back-home">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Landing Page
          </a>

        <div class="section-title">
            <span class="badge-title">Tentang Sekolah</span>
        </div>

        <div class="row align-items-center g-5">

            {{-- FOTO SEKOLAH --}}

            <div class="col-lg-5">
                @if(
                    isset($sekolah) &&
                    $sekolah->foto &&
                    file_exists(public_path('uploads/sekolah/' . $sekolah->foto))
                )
                    <img
                        src="{{ asset('uploads/sekolah/' . $sekolah->foto) }}"
                        class="profile-image"
                        alt="{{ $namaSekolah }}">
                @else
                    <img
                        src="{{ asset('assets/images/logosman1samarinda.png') }}"
                        class="profile-image"
                        alt="{{ $namaSekolah }}">
                @endif
            </div>

            {{-- INFORMASI SEKOLAH --}}

            <div class="col-lg-7">
                <div class="profile-content">

                    <h2>{{ $namaSekolah }}</h2>

                    <p class="profile-description">
                        {{ $deskripsi }}
                    </p>

                    <div class="profile-info">

                        <div class="profile-info-item">
                            <small>
                                <i class="bi bi-person-badge"></i>
                                Kepala Sekolah
                            </small>
                            <strong>
                                {{ $sekolah->kepala_sekolah ?? '-' }}
                            </strong>
                        </div>

                        <div class="profile-info-item">
                            <small>
                                <i class="bi bi-calendar3"></i>
                                Tahun Berdiri
                            </small>
                            <strong>
                                {{ $sekolah->tahun_berdiri ?? '-' }}
                            </strong>
                        </div>

                        <div class="profile-info-item">
                            <small>
                                <i class="bi bi-geo-alt"></i>
                                Alamat
                            </small>
                            <strong>
                                {{ $sekolah->alamat ?? '-' }}
                            </strong>
                        </div>

                        <div class="profile-info-item">
                            <small>
                                <i class="bi bi-telephone"></i>
                                Kontak
                            </small>
                            <strong>
                                {{ $sekolah->kontak ?? '-' }}
                            </strong>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

{{-- =========================
     FOOTER SEKOLAH
========================= --}}

<footer class="school-footer">
    <div class="container">

        <div class="row footer-content">

            {{-- KOLOM 1: IDENTITAS DAN MEDIA SOSIAL --}}

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
                    {{ $deskripsi }}
                </p>

                <div class="footer-social">

                    <a href="{{ $sekolah->facebook ?? '#' }}"
                       aria-label="Facebook"
                       target="_blank"
                       rel="noopener noreferrer">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="{{ $sekolah->instagram ?? '#' }}"
                       aria-label="Instagram"
                       target="_blank"
                       rel="noopener noreferrer">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="{{ $sekolah->youtube ?? '#' }}"
                       aria-label="YouTube"
                       target="_blank"
                       rel="noopener noreferrer">
                        <i class="bi bi-youtube"></i>
                    </a>

                </div>
            </div>

            {{-- KOLOM 2: MENU --}}

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

            {{-- KOLOM 3: INFORMASI SEKOLAH --}}

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

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="shortcut icon"
          href="{{ $sekolah && $sekolah->logo
              ? asset('uploads/sekolah/' . $sekolah->logo)
              : asset('assets/images/logosman1samarinda.png') }}">

    <style>
        * {
            scroll-behavior: smooth;
        }

        html {
            scroll-padding-top: 90px;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        /* ================= NAVBAR ================= */

        .main-navbar {
            background: linear-gradient(
                135deg,
                #0f172a 0%,
                #172554 45%,
                #1d4ed8 100%
            );

            padding: 12px 0;

            box-shadow:
                0 8px 30px rgba(15, 23, 42, .22);

            z-index: 9999;

            transition: all .35s ease;
        }

        .main-navbar.scrolled {
            padding: 7px 0;

            background: linear-gradient(
                135deg,
                #0f172a,
                #1e3a8a
            );

            box-shadow:
                0 10px 35px rgba(15, 23, 42, .30);
        }

        /* ================= BRAND ================= */

        .school-brand {
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .school-logo {
            width: 58px;
            height: 58px;
            object-fit: contain;

            padding: 4px;

            border-radius: 10px;

            background: rgba(255,255,255,.95);

            box-shadow:
                0 5px 15px rgba(0,0,0,.18);

            transition: all .35s ease;
        }

        .main-navbar.scrolled .school-logo {
            width: 48px;
            height: 48px;
        }

        .school-name {
            font-size: 17px;
            font-weight: 800;
            color: #fff;
            line-height: 1.2;
            letter-spacing: .2px;
        }

        .school-subtitle {
            margin-top: 3px;
            font-size: 12px;
            color: rgba(255,255,255,.70);
        }

        /* ================= NAV MENU ================= */

        .navbar-nav {
            gap: 3px;
        }

        .nav-link {
            position: relative;

            color: rgba(255,255,255,.82) !important;

            font-weight: 600;
            font-size: 14px;

            padding: 10px 14px !important;

            margin: 0 1px;

            border-radius: 10px;

            transition: all .3s ease;
        }

        .nav-link:hover {
            color: #fff !important;

            background: rgba(255,255,255,.10);

            transform: translateY(-1px);
        }

        /* ================= MENU AKTIF ================= */

        .nav-link.active {
            color: #fff !important;

            background: rgba(255,255,255,.14);

            font-weight: 800;

            box-shadow:
                inset 0 0 0 1px rgba(255,255,255,.08);
        }

        .nav-link.active::after {
            content: "";

            position: absolute;

            left: 14px;
            right: 14px;

            bottom: 3px;

            height: 3px;

            background: #60a5fa;

            border-radius: 10px;

            box-shadow:
                0 0 10px rgba(96,165,250,.8);

            transition: all .3s ease;
        }

        /* ================= LOGIN BUTTON ================= */

        .login-btn {
            text-decoration: none;

            color: #172554 !important;

            background: #fff;

            padding: 10px 18px;

            border-radius: 10px;

            font-weight: 700;

            margin-left: 10px;

            display: inline-flex;

            align-items: center;

            gap: 7px;

            box-shadow:
                0 8px 20px rgba(0,0,0,.15);

            transition: all .3s ease;
        }

        .login-btn:hover {
            color: #1d4ed8 !important;

            background: #eff6ff;

            transform: translateY(-2px);

            box-shadow:
                0 12px 25px rgba(0,0,0,.20);
        }

        /* ================= TOGGLE MOBILE ================= */

        .navbar-toggler {
            border: 1px solid rgba(255,255,255,.35);

            padding: 7px 10px;

            border-radius: 9px;

            background: rgba(255,255,255,.08);
        }

        .navbar-toggler:focus {
            box-shadow:
                0 0 0 3px rgba(96,165,250,.25);
        }

        .navbar-toggler-icon {
            filter: brightness(0) invert(1);
        }

        /* ================= MAIN ================= */

        main {
            padding-top: 82px;
        }

        .section-padding {
            padding: 90px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title .small-title {
            color: #2563eb;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .section-title h2 {
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .section-title p {
            color: #64748b;
            max-width: 700px;
            margin: auto;
        }

        /* ================= MOBILE ================= */

        @media(max-width: 991px) {

            .main-navbar {
                padding: 10px 0;
            }

            .school-logo {
                width: 50px;
                height: 50px;
            }

            .school-name {
                font-size: 15px;
            }

            .school-subtitle {
                font-size: 11px;
            }

            .navbar-collapse {
                margin-top: 15px;

                padding: 12px;

                border-radius: 15px;

                background: rgba(15,23,42,.75);

                backdrop-filter: blur(15px);

                border: 1px solid rgba(255,255,255,.10);
            }

            .navbar-nav {
                padding-top: 0;

                gap: 3px;
            }

            .nav-link {
                margin: 2px 0;

                padding: 11px 14px !important;
            }

            .nav-link.active {
                background: rgba(255,255,255,.14);
            }

            .nav-link.active::after {
                display: none;
            }

            .login-btn {
                width: 100%;

                justify-content: center;

                margin-left: 0;

                margin-top: 10px;
            }

            main {
                padding-top: 72px;
            }
        }

        @media(max-width: 575px) {

            .school-logo {
                width: 45px;
                height: 45px;
            }

            .school-name {
                font-size: 14px;
            }

            .school-subtitle {
                font-size: 10px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg main-navbar fixed-top">

    <div class="container">

        <!-- LOGO + NAMA SEKOLAH -->

        <a class="school-brand"
           href="{{ route('public.dashboard') }}#beranda"
           data-section="beranda">

            <img src="{{ $sekolah && $sekolah->logo
                ? asset('uploads/sekolah/' . $sekolah->logo)
                : asset('assets/images/logosman1samarinda.png') }}"
                 class="school-logo"
                 alt="Logo Sekolah">

            <div>

                <div class="school-name">
                    {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}
                </div>

                <div class="school-subtitle">
                    Situs Resmi Sekolah
                </div>

            </div>

        </a>

        <!-- TOGGLE MOBILE -->

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- MENU -->

        <div class="collapse navbar-collapse"
             id="navbarMenu">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <!-- BERANDA -->

                <li class="nav-item">

                    <a class="nav-link active"
                       href="{{ route('public.dashboard') }}#beranda"
                       data-section="beranda">

                        <i class="bi bi-house-door me-1"></i>

                        Beranda

                    </a>

                </li>

                <!-- PROFIL -->

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('public.dashboard') }}#profil"
                       data-section="profil">

                        <i class="bi bi-building me-1"></i>

                        Profil

                    </a>

                </li>

                <!-- GURU -->

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('public.dashboard') }}#guru"
                       data-section="guru">

                        <i class="bi bi-person-badge me-1"></i>

                        Guru

                    </a>

                </li>

                <!-- SISWA -->

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('public.dashboard') }}#siswa"
                       data-section="siswa">

                        <i class="bi bi-people me-1"></i>

                        Siswa

                    </a>

                </li>

                <!-- BERITA -->

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('public.dashboard') }}#berita"
                       data-section="berita">

                        <i class="bi bi-newspaper me-1"></i>

                        Berita

                    </a>

                </li>

                <!-- GALERI -->

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('public.dashboard') }}#galeri"
                       data-section="galeri">

                        <i class="bi bi-images me-1"></i>

                        Galeri

                    </a>

                </li>

                <!-- EKSTRAKURIKULER -->

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('public.dashboard') }}#ekstrakurikuler"
                       data-section="ekstrakurikuler">

                        <i class="bi bi-trophy me-1"></i>

                        Ekstrakurikuler

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- ================= CONTENT ================= -->

<main>

    @yield('content')

</main>

<!-- ================= BOOTSTRAP ================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- ================= NAVBAR SCRIPT ================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const navLinks = document.querySelectorAll('.nav-link');

    const brand = document.querySelector('.school-brand');

    const sections = document.querySelectorAll('section[id]');

    const navbar = document.querySelector('.main-navbar');

    const navbarMenu = document.getElementById('navbarMenu');

    /* ==============================
       MENU AKTIF
    ============================== */

    function setActiveMenu(sectionId) {

        navLinks.forEach(function (link) {

            link.classList.remove('active');

            if (link.dataset.section === sectionId) {
                link.classList.add('active');
            }

        });

    }

    /* ==============================
       KETIKA MENU DIKLIK
    ============================== */

    navLinks.forEach(function (link) {

        link.addEventListener('click', function () {

            const sectionId = this.dataset.section;

            setActiveMenu(sectionId);

            /* Tutup menu HP */

            if (navbarMenu.classList.contains('show')) {

                const collapse =
                    bootstrap.Collapse.getInstance(navbarMenu);

                if (collapse) {
                    collapse.hide();
                }

            }

        });

    });

    /* ==============================
       LOGO KEMBALI KE BERANDA
    ============================== */

    if (brand) {

        brand.addEventListener('click', function () {

            setActiveMenu('beranda');

        });

    }

    /* ==============================
       MENU AKTIF SAAT SCROLL
    ============================== */

    function updateActiveMenu() {

        let currentSection = 'beranda';

        const scrollPosition = window.scrollY + 180;

        sections.forEach(function (section) {

            const sectionTop = section.offsetTop;

            const sectionHeight = section.offsetHeight;

            if (
                scrollPosition >= sectionTop &&
                scrollPosition < sectionTop + sectionHeight
            ) {

                currentSection = section.id;

            }

        });

        setActiveMenu(currentSection);

    }

    /* ==============================
       NAVBAR SAAT SCROLL
    ============================== */

    function updateNavbar() {

        if (window.scrollY > 50) {

            navbar.classList.add('scrolled');

        } else {

            navbar.classList.remove('scrolled');

        }

    }

    window.addEventListener('scroll', function () {

        updateActiveMenu();

        updateNavbar();

    });

    /* ==============================
       HASH URL
    ============================== */

    const hash = window.location.hash.replace('#', '');

    if (hash) {

        setActiveMenu(hash);

    } else {

        setActiveMenu('beranda');

    }

    updateActiveMenu();

    updateNavbar();

});

</script>

@stack('scripts')

</body>
</html>

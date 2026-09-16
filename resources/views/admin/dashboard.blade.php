<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Spark Admin</title>

    <meta name="description" content="Dashboard Sistem Informasi Sekolah">
    <meta name="author" content="Spark Admin">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet"
          href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

    <!-- ApexCharts -->
    <link rel="stylesheet"
          href="{{ asset('assets/libs/apexcharts/apexcharts.css') }}">

    <!-- Flatpickr -->
    <link rel="stylesheet"
          href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">

    <!-- CSS UTAMA -->
    <link rel="stylesheet"
          href="{{ asset('assets/css/main.css') }}">

</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

<div class="sidebar-wrapper" id="sidebar">


    <!-- LOGO -->

    <a href="{{ url('/dashboard') }}" class="sidebar-brand">

        <i class="bi bi-asterisk"></i>

        <span>Spark Admin</span>

    </a>


    <!-- MENU -->

    <div class="flex-grow-1 overflow-y-auto">


        <!-- MENU -->

        <div class="sidebar-menu-section">

            <div class="sidebar-menu-title">
                Menu
            </div>


            <ul class="sidebar-menu-list">

                <li class="sidebar-menu-item">

                    <a href="{{ url('/dashboard') }}"
                       class="sidebar-menu-link {{ request()->is('dashboard') ? 'active' : '' }}"
                       id="menu-overview"
                       title="Dashboard">

                        <i class="bi bi-grid-fill"></i>

                        <span>Dashboard</span>

                    </a>

                </li>

            </ul>

        </div>



        <!-- PROFILE -->

        <div class="sidebar-menu-section">

            <div class="sidebar-menu-title">
                Profile
            </div>


            <ul class="sidebar-menu-list">

                <li class="sidebar-menu-item">

                    <a href="{{ route('admin.profile') }}"
                       class="sidebar-menu-link"
                       id="menu-profile"
                       title="Profile Sekolah">

                        <i class="bi bi-building"></i>

                        <span>Profile Sekolah</span>

                    </a>

                </li>

            </ul>

        </div>



        <!-- KELOLA -->

        <div class="sidebar-menu-section">

            <div class="sidebar-menu-title">
                Kelola
            </div>


            <ul class="sidebar-menu-list">


                <!-- BERITA -->

                <li class="sidebar-menu-item">

                    <a href="{{ route('admin.berita') }}"
                       class="sidebar-menu-link"
                       title="Kelola Berita">

                        <i class="bi bi-newspaper"></i>

                        <span>Kelola Berita</span>

                    </a>

                </li>


                <!-- GURU -->

                <li class="sidebar-menu-item">

                    <a href="{{ route('admin.guru') }}"
                       class="sidebar-menu-link"
                       title="Kelola Guru">

                        <i class="bi bi-person-badge"></i>

                        <span>Kelola Guru</span>

                    </a>

                </li>


                <!-- SISWA -->

                <li class="sidebar-menu-item">

                    <a href="{{ route('admin.siswa') }}"
                       class="sidebar-menu-link"
                       title="Kelola Siswa">

                        <i class="bi bi-person-vcard"></i>

                        <span>Kelola Siswa</span>

                    </a>

                </li>


                <!-- EKSTRAKULIKULER -->

                <li class="sidebar-menu-item">

                    <a href="{{ route('admin.ekstrakulikuler') }}"
                       class="sidebar-menu-link"
                       title="Kelola Ekstrakulikuler">

                        <i class="bi bi-trophy"></i>

                        <span>Kelola Ekstrakulikuler</span>

                    </a>

                </li>


                <!-- GALERI -->

                <li class="sidebar-menu-item">

                    <a href="{{ route('admin.galeri') }}"
                       class="sidebar-menu-link"
                       title="Kelola Galeri">

                        <i class="bi bi-image"></i>

                        <span>Kelola Galeri</span>

                    </a>

                </li>


            </ul>

        </div>

    </div>



    <!-- =================================================
         PROFILE ADMIN
    ================================================= -->

    <div class="sidebar-profile">

        <img src="{{ asset('assets/images/avatar.png') }}"
             alt="Administrator"
             class="sidebar-profile-img">

        <div class="sidebar-profile-info">

            <div class="sidebar-profile-name">
                Administrator
            </div>

            <div class="sidebar-profile-email">
                admin@email.com
            </div>

        </div>

    </div>


</div>



<!-- =====================================================
     MAIN WRAPPER
===================================================== -->

<div class="main-wrapper">



    <!-- =================================================
         TOP NAVBAR
    ================================================= -->

    <header class="navbar-custom">


        <!-- LEFT -->

        <div class="navbar-left">


            <!-- SIDEBAR TOGGLE -->

            <button
                class="btn-desktop-toggle d-none d-xl-flex align-items-center justify-content-center me-3"
                id="desktop-sidebar-toggle"
                aria-label="Minimize Sidebar">

                <i class="bi bi-chevron-bar-left"></i>

            </button>



            <!-- MOBILE TOGGLE -->

            <button
                class="sidebar-toggle-btn me-2"
                id="sidebar-toggle"
                aria-label="Toggle Navigation">

                <i class="bi bi-list"></i>

            </button>



            <!-- CREATE -->

            <div class="dropdown ms-2">

                <button
                    class="btn-quick-action dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    id="quick-actions-dropdown">

                    <i class="bi bi-plus-lg"></i>

                    <span>Create</span>

                </button>


                <ul
                    class="dropdown-menu dropdown-menu-quick-action"
                    aria-labelledby="quick-actions-dropdown">

                    <li class="dropdown-header">
                        Quick Action Shortcuts
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-file-earmark-plus"></i>
                            New Invoice
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-person-plus"></i>
                            New User
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-box-seam"></i>
                            New Product
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-gear"></i>
                            System Settings
                        </a>
                    </li>

                </ul>

            </div>

        </div>



        <!-- SEARCH -->

        <div class="navbar-search-wrapper">

            <input
                type="text"
                class="navbar-search-input"
                placeholder="Search anything in Spark..."
                id="main-search">

            <button
                class="navbar-search-btn"
                aria-label="Search">

                <i class="bi bi-search"></i>

            </button>

        </div>



        <!-- RIGHT -->

        <div class="navbar-actions">


            <!-- FULLSCREEN -->

            <button
                class="navbar-action-btn me-1"
                aria-label="Toggle Fullscreen"
                id="btn-fullscreen">

                <i class="bi bi-arrows-fullscreen"></i>

            </button>



            <!-- NOTIFICATION -->

            <div class="dropdown">

                <button
                    class="navbar-action-btn dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    id="btn-notifications"
                    data-bs-auto-close="outside">

                    <i class="bi bi-bell"></i>

                    <span class="navbar-action-badge"></span>

                </button>


                <div
                    class="dropdown-menu dropdown-menu-end dropdown-menu-notification p-0"
                    aria-labelledby="btn-notifications">


                    <div class="notification-header">

                        <h6 class="notification-title">
                            Notifications
                        </h6>

                        <button
                            class="btn-clear-all"
                            type="button">

                            Mark all read

                        </button>

                    </div>


                    <div class="notification-list">


                        <a href="#" class="notification-item">

                            <div class="notification-icon bg-success text-white">

                                <i class="bi bi-wallet2"></i>

                            </div>

                            <div class="notification-content">

                                <p class="notification-text">
                                    Sistem berjalan dengan baik
                                </p>

                                <span class="notification-time">
                                    Sekarang
                                </span>

                            </div>

                        </a>


                        <a href="#" class="notification-item">

                            <div class="notification-icon bg-primary text-white">

                                <i class="bi bi-person-plus-fill"></i>

                            </div>

                            <div class="notification-content">

                                <p class="notification-text">
                                    Selamat datang Administrator
                                </p>

                                <span class="notification-time">
                                    Sekarang
                                </span>

                            </div>

                        </a>


                    </div>


                    <a href="#" class="notification-footer">
                        View All Notifications
                    </a>

                </div>

            </div>



            <!-- PROFILE -->

            <div class="dropdown ms-2">

                <button
                    class="navbar-profile-btn dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    id="profile-dropdown">

                    <img
                        src="{{ asset('assets/images/avatar.png') }}"
                        alt="Profile Image"
                        class="navbar-profile-img">

                    <span class="navbar-profile-name d-none d-md-inline">
                        Administrator
                    </span>

                    <i class="bi bi-chevron-down navbar-profile-caret"></i>

                </button>


                <ul
                    class="dropdown-menu dropdown-menu-end dropdown-menu-profile"
                    aria-labelledby="profile-dropdown">

                    <li class="dropdown-header">
                        Welcome !
                    </li>

                    <li>

                        <a class="dropdown-item"
                           href="{{ route('admin.profile') }}">

                            <i class="bi bi-person"></i>

                            Profile

                        </a>

                    </li>


                    <li>

                        <a class="dropdown-item" href="#">

                            <i class="bi bi-gear"></i>

                            Settings

                        </a>

                    </li>


                    <li>

                        <a class="dropdown-item" href="#">

                            <i class="bi bi-lock"></i>

                            Lock Screen

                        </a>

                    </li>


                    <li>

                        <hr class="dropdown-divider">

                    </li>


                    <li>

                        <a class="dropdown-item text-danger"
                           href="#">

                            <i class="bi bi-box-arrow-right"></i>

                            Logout

                        </a>

                    </li>

                </ul>

            </div>


        </div>

    </header>



    <!-- =================================================
         CONTENT DASHBOARD
    ================================================= -->

    <div class="main-content">

        <div class="page-content">

            <div class="container-fluid">


                <!-- JUDUL -->

                <div class="mb-4">

                    <h3 class="fw-semibold">
                        Dashboard
                    </h3>

                    <p class="text-muted mb-0">
                        Selamat datang di halaman dashboard
                        Sistem Informasi Sekolah.
                    </p>

                </div>



                <!-- =================================================
                     STATISTIK
                ================================================= -->

                <div class="row g-4 mb-4">


                    <!-- SISWA -->

                    <div class="col-xl-3 col-md-6">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center">

                                    <div>

                                        <p class="text-muted mb-2">
                                            Total Siswa
                                        </p>

                                        <h3 class="fw-bold mb-0">

                                            {{ \App\Models\Siswa::count() }}

                                        </h3>

                                    </div>


                                    <div class="fs-1 text-primary">

                                        <i class="bi bi-person-vcard"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- GURU -->

                    <div class="col-xl-3 col-md-6">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center">

                                    <div>

                                        <p class="text-muted mb-2">
                                            Total Guru
                                        </p>

                                        <h3 class="fw-bold mb-0">

                                            {{ \App\Models\Guru::count() }}

                                        </h3>

                                    </div>


                                    <div class="fs-1 text-primary">

                                        <i class="bi bi-person-badge"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- BERITA -->

                    <div class="col-xl-3 col-md-6">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center">

                                    <div>

                                        <p class="text-muted mb-2">
                                            Total Berita
                                        </p>

                                        <h3 class="fw-bold mb-0">

                                            {{ \App\Models\Berita::count() }}

                                        </h3>

                                    </div>


                                    <div class="fs-1 text-primary">

                                        <i class="bi bi-newspaper"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- EKSTRAKULIKULER -->

                    <div class="col-xl-3 col-md-6">

                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center">

                                    <div>

                                        <p class="text-muted mb-2">
                                            Ekstrakulikuler
                                        </p>

                                        <h3 class="fw-bold mb-0">

                                            {{ \App\Models\Ekstrakulikuler::count() }}

                                        </h3>

                                    </div>


                                    <div class="fs-1 text-primary">

                                        <i class="bi bi-trophy"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                </div>



                <!-- =================================================
                     MENU CEPAT
                ================================================= -->

                <div class="mb-3">

                    <h5 class="fw-semibold">
                        Menu Cepat
                    </h5>

                </div>


                <div class="row g-4 mb-4">


                    <!-- PROFILE -->

                    <div class="col-xl-4 col-md-6">

                        <a href="{{ route('admin.profile') }}"
                           class="text-decoration-none">

                            <div class="card border-0 shadow-sm h-100">

                                <div class="card-body">

                                    <div class="d-flex align-items-center">

                                        <div class="fs-2 text-primary me-3">

                                            <i class="bi bi-building"></i>

                                        </div>

                                        <div>

                                            <h6 class="mb-1">
                                                Profile Sekolah
                                            </h6>

                                            <small class="text-muted">
                                                Kelola informasi sekolah
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>



                    <!-- BERITA -->

                    <div class="col-xl-4 col-md-6">

                        <a href="{{ route('admin.berita') }}"
                           class="text-decoration-none">

                            <div class="card border-0 shadow-sm h-100">

                                <div class="card-body">

                                    <div class="d-flex align-items-center">

                                        <div class="fs-2 text-primary me-3">

                                            <i class="bi bi-newspaper"></i>

                                        </div>

                                        <div>

                                            <h6 class="mb-1">
                                                Kelola Berita
                                            </h6>

                                            <small class="text-muted">
                                                Kelola berita sekolah
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>



                    <!-- GURU -->

                    <div class="col-xl-4 col-md-6">

                        <a href="{{ route('admin.guru') }}"
                           class="text-decoration-none">

                            <div class="card border-0 shadow-sm h-100">

                                <div class="card-body">

                                    <div class="d-flex align-items-center">

                                        <div class="fs-2 text-primary me-3">

                                            <i class="bi bi-person-badge"></i>

                                        </div>

                                        <div>

                                            <h6 class="mb-1">
                                                Kelola Guru
                                            </h6>

                                            <small class="text-muted">
                                                Kelola data guru
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>



                    <!-- SISWA -->

                    <div class="col-xl-4 col-md-6">

                        <a href="{{ route('admin.siswa') }}"
                           class="text-decoration-none">

                            <div class="card border-0 shadow-sm h-100">

                                <div class="card-body">

                                    <div class="d-flex align-items-center">

                                        <div class="fs-2 text-primary me-3">

                                            <i class="bi bi-person-vcard"></i>

                                        </div>

                                        <div>

                                            <h6 class="mb-1">
                                                Kelola Siswa
                                            </h6>

                                            <small class="text-muted">
                                                Kelola data siswa
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>



                    <!-- EKSTRAKULIKULER -->

                    <div class="col-xl-4 col-md-6">

                        <a href="{{ route('admin.ekstrakulikuler') }}"
                           class="text-decoration-none">

                            <div class="card border-0 shadow-sm h-100">

                                <div class="card-body">

                                    <div class="d-flex align-items-center">

                                        <div class="fs-2 text-primary me-3">

                                            <i class="bi bi-trophy"></i>

                                        </div>

                                        <div>

                                            <h6 class="mb-1">
                                                Ekstrakulikuler
                                            </h6>

                                            <small class="text-muted">
                                                Kelola kegiatan sekolah
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>



                    <!-- GALERI -->

                    <div class="col-xl-4 col-md-6">

                        <a href="{{ route('admin.galeri') }}"
                           class="text-decoration-none">

                            <div class="card border-0 shadow-sm h-100">

                                <div class="card-body">

                                    <div class="d-flex align-items-center">

                                        <div class="fs-2 text-primary me-3">

                                            <i class="bi bi-image"></i>

                                        </div>

                                        <div>

                                            <h6 class="mb-1">
                                                Kelola Galeri
                                            </h6>

                                            <small class="text-muted">
                                                Kelola galeri sekolah
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>


                </div>



                <!-- =================================================
                     BERITA TERBARU
                ================================================= -->

                <div class="row">

                    <div class="col-12">


                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <h5 class="fw-semibold mb-0">
                                Berita Terbaru
                            </h5>


                            <a href="{{ route('admin.berita') }}"
                               class="text-decoration-none">

                                Lihat Semua

                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </div>



                        <div class="card border-0 shadow-sm">

                            <div class="card-body">


                                @php

                                    $beritaTerbaru =
                                        \App\Models\Berita::latest()
                                        ->take(4)
                                        ->get();

                                @endphp


                                @forelse ($beritaTerbaru as $berita)


                                    <div class="d-flex align-items-center py-3 border-bottom">


                                        <div class="fs-4 text-primary me-3">

                                            <i class="bi bi-newspaper"></i>

                                        </div>


                                        <div class="flex-grow-1">

                                            <strong>

                                                {{ $berita->judul ?? 'Berita Sekolah' }}

                                            </strong>

                                            <div>

                                                <small class="text-muted">

                                                    Berita sekolah

                                                </small>

                                            </div>

                                        </div>


                                        <i class="bi bi-chevron-right text-secondary"></i>


                                    </div>


                                @empty


                                    <div class="text-center py-4">

                                        <i class="bi bi-newspaper fs-2 text-secondary"></i>

                                        <p class="text-secondary mb-0 mt-2">

                                            Belum ada berita.

                                        </p>

                                    </div>


                                @endforelse


                            </div>

                        </div>


                    </div>

                </div>


            </div>

        </div>

    </div>



    <!-- =================================================
         FOOTER
    ================================================= -->

    <footer class="footer-custom">


        <div class="footer-left">

            <span class="footer-logo">

                <i class="bi bi-asterisk"></i>

                Spark Admin

            </span>


            <span class="footer-separator">
                |
            </span>


            <span class="footer-copy">

                &copy; 2026 Made with

                <i class="bi bi-heart-fill text-danger footer-heart"></i>

                by Spark Admin • Distributed by ThemeWagon

            </span>

        </div>


        <div class="footer-right">

            <ul class="footer-links">

                <li>
                    <a href="#" class="footer-link">
                        Overview
                    </a>
                </li>

                <li>
                    <a href="#" class="footer-link">
                        Statistics
                    </a>
                </li>

                <li>
                    <a href="#" class="footer-link">
                        Help & Documentation
                    </a>
                </li>

                <li>
                    <a href="#" class="footer-link">

                        Status

                        <span class="status-dot"></span>

                    </a>
                </li>

            </ul>

        </div>


    </footer>


</div>



<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

<script src="{{ asset('assets/js/dashboard.js') }}"></script>


</body>

</html>
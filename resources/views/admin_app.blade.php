<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Informasi Sekolah</title>

    <meta name="description" content="Sistem Informasi Sekolah">
    <meta name="author" content="Admin Sekolah">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

    <!-- ApexCharts -->
    <link rel="stylesheet" href="{{ asset('assets/libs/apexcharts/apexcharts.css') }}">

    <!-- Flatpickr -->
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <style>
        html,
        body {
            min-height: 100%;
            margin: 0;
        }

        body {
            min-height: 100vh;
        }

        .main-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
        }

        .page-content {
            min-height: calc(100vh - 140px);
        }

        .footer-custom {
            margin-top: auto;
        }
    </style>
</head>

<body>

    <!-- ==========================================
         START: SIDEBAR
         ========================================== -->

    <div class="sidebar-wrapper" id="sidebar">

        <!-- Brand -->
        <a href="{{ url('/dashboard') }}" class="sidebar-brand">

            <i class="bi bi-building"></i>

            <span>Sistem Informasi Sekolah</span>

        </a>


        <!-- Navigation -->
        <div class="flex-grow-1 overflow-y-auto">

            <!-- ================= MENU ================= -->

            <div class="sidebar-menu-section">

                <div class="sidebar-menu-title">
                    Menu
                </div>

                <ul class="sidebar-menu-list">

                    <!-- Dashboard -->
                    <li class="sidebar-menu-item">

                        <a href="{{ url('/dashboard') }}"
                            class="sidebar-menu-link {{ request()->is('dashboard') ? 'active' : '' }}"
                            title="Dashboard">

                            <i class="bi bi-grid-fill"></i>

                            <span>Dashboard</span>

                        </a>

                    </li>

                </ul>

            </div>


            <!-- ================= PROFILE ================= -->

            <div class="sidebar-menu-section">

                <div class="sidebar-menu-title">
                    Profile
                </div>

                <ul class="sidebar-menu-list">

                    <!-- Profile Sekolah -->
                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.profile') }}"
                            class="sidebar-menu-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}"
                            title="Profile Sekolah">

                            <i class="bi bi-building"></i>

                            <span>Profile Sekolah</span>

                        </a>

                    </li>

                </ul>

            </div>


            <!-- ================= KELOLA ================= -->

            <div class="sidebar-menu-section">

                <div class="sidebar-menu-title">
                    Kelola
                </div>

                <ul class="sidebar-menu-list">

                    <!-- Kelola Berita -->
                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.berita') }}"
                            class="sidebar-menu-link {{ request()->routeIs('admin.berita') ? 'active' : '' }}"
                            title="Kelola Berita">

                            <i class="bi bi-newspaper"></i>

                            <span>Kelola Berita</span>

                        </a>

                    </li>


                    <!-- Kelola Guru -->
                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.guru') }}"
                            class="sidebar-menu-link {{ request()->routeIs('admin.guru') ? 'active' : '' }}"
                            title="Kelola Guru">

                            <i class="bi bi-person-badge"></i>

                            <span>Kelola Guru</span>

                        </a>

                    </li>


                    <!-- Kelola Siswa -->
                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.siswa') }}"
                            class="sidebar-menu-link {{ request()->routeIs('admin.siswa') ? 'active' : '' }}"
                            title="Kelola Siswa">

                            <i class="bi bi-person-vcard"></i>

                            <span>Kelola Siswa</span>

                        </a>

                    </li>


                    <!-- Kelola Ekstrakulikuler -->
                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.ekstrakulikuler') }}"
                            class="sidebar-menu-link {{ request()->routeIs('admin.ekstrakulikuler') ? 'active' : '' }}"
                            title="Kelola Ekstrakulikuler">

                            <i class="bi bi-trophy"></i>

                            <span>Kelola Ekstrakulikuler</span>

                        </a>

                    </li>


                    <!-- Kelola Galeri -->
                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.galeri') }}"
                            class="sidebar-menu-link {{ request()->routeIs('admin.galeri') ? 'active' : '' }}"
                            title="Kelola Galeri">

                            <i class="bi bi-images"></i>

                            <span>Kelola Galeri</span>

                        </a>

                    </li>

                </ul>

            </div>

        </div>


        <!-- ==========================================
             SIDEBAR PROFILE
             ========================================== -->

        <div class="sidebar-profile">

            <img src="{{ asset('assets/images/avatar.png') }}"
                alt="Administrator"
                class="sidebar-profile-img"
                onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=256&auto=format&fit=crop'">

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

    <!-- ==========================================
         END: SIDEBAR
         ========================================== -->



    <!-- ==========================================
         START: MAIN WRAPPER
         ========================================== -->

    <div class="main-wrapper">


        <!-- ==========================================
             START: NAVBAR
             ========================================== -->

        <header class="navbar-custom">

            <div class="navbar-left">


                <!-- Desktop Sidebar Toggle -->
                <button class="btn-desktop-toggle d-none d-xl-flex align-items-center justify-content-center me-3"
                    id="desktop-sidebar-toggle"
                    aria-label="Minimize Sidebar">

                    <i class="bi bi-chevron-bar-left"></i>

                </button>


                <!-- Mobile Sidebar Toggle -->
                <button class="sidebar-toggle-btn me-2"
                    id="sidebar-toggle"
                    aria-label="Toggle Navigation">

                    <i class="bi bi-list"></i>

                </button>


                <!-- Create Dropdown -->
                <div class="dropdown ms-2">

                    <button class="btn-quick-action dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        id="quick-actions-dropdown">

                        <i class="bi bi-plus-lg"></i>

                        <span>Create</span>

                    </button>


                    <ul class="dropdown-menu dropdown-menu-quick-action"
                        aria-labelledby="quick-actions-dropdown">

                        <li class="dropdown-header">
                            Quick Action
                        </li>


                        <li>

                            <a class="dropdown-item"
                                href="{{ route('admin.berita') }}">

                                <i class="bi bi-newspaper"></i>

                                Berita Baru

                            </a>

                        </li>


                        <li>

                            <a class="dropdown-item"
                                href="{{ route('admin.guru') }}">

                                <i class="bi bi-person-plus"></i>

                                Guru Baru

                            </a>

                        </li>


                        <li>

                            <a class="dropdown-item"
                                href="{{ route('admin.siswa') }}">

                                <i class="bi bi-person-plus"></i>

                                Siswa Baru

                            </a>

                        </li>


                        <li>

                            <a class="dropdown-item"
                                href="{{ route('admin.ekstrakulikuler') }}">

                                <i class="bi bi-trophy"></i>

                                Ekstrakulikuler Baru

                            </a>

                        </li>

                    </ul>

                </div>

            </div>



            <!-- Search -->
            <div class="navbar-search-wrapper">

                <input type="text"
                    class="navbar-search-input"
                    placeholder="Cari sesuatu..."
                    id="main-search">

                <button class="navbar-search-btn"
                    aria-label="Search">

                    <i class="bi bi-search"></i>

                </button>

            </div>



            <!-- Right Actions -->
            <div class="navbar-actions">


                <!-- Fullscreen -->
                <button class="navbar-action-btn me-1"
                    aria-label="Toggle Fullscreen"
                    id="btn-fullscreen">

                    <i class="bi bi-arrows-fullscreen"></i>

                </button>



                <!-- Notification -->
                <div class="dropdown">

                    <button class="navbar-action-btn dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        id="btn-notifications"
                        data-bs-auto-close="outside">

                        <i class="bi bi-bell"></i>

                        <span class="navbar-action-badge"></span>

                    </button>


                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-notification p-0"
                        aria-labelledby="btn-notifications">


                        <div class="notification-header">

                            <h6 class="notification-title">
                                Notifications
                            </h6>

                            <button class="btn-clear-all"
                                type="button">

                                Tandai sudah dibaca

                            </button>

                        </div>



                        <div class="notification-list">


                            <!-- Notification 1 -->
                            <a href="#"
                                class="notification-item">

                                <div class="notification-icon bg-success text-white">

                                    <i class="bi bi-newspaper"></i>

                                </div>

                                <div class="notification-content">

                                    <p class="notification-text">

                                        Berita baru berhasil ditambahkan.

                                    </p>

                                    <span class="notification-time">
                                        Baru saja
                                    </span>

                                </div>

                                <span class="notification-unread-dot"></span>

                            </a>



                            <!-- Notification 2 -->
                            <a href="#"
                                class="notification-item">

                                <div class="notification-icon bg-primary text-white">

                                    <i class="bi bi-person-plus-fill"></i>

                                </div>

                                <div class="notification-content">

                                    <p class="notification-text">

                                        Data siswa baru tersedia.

                                    </p>

                                    <span class="notification-time">
                                        1 jam lalu
                                    </span>

                                </div>

                                <span class="notification-unread-dot"></span>

                            </a>



                            <!-- Notification 3 -->
                            <a href="#"
                                class="notification-item">

                                <div class="notification-icon bg-warning text-dark">

                                    <i class="bi bi-images"></i>

                                </div>

                                <div class="notification-content">

                                    <p class="notification-text">

                                        Galeri sekolah diperbarui.

                                    </p>

                                    <span class="notification-time">
                                        3 jam lalu
                                    </span>

                                </div>

                            </a>


                        </div>


                        <a href="#"
                            class="notification-footer">

                            Lihat Semua Notifikasi

                        </a>

                    </div>

                </div>



                <!-- Profile -->
                <div class="dropdown ms-2">

                    <button class="navbar-profile-btn dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        id="profile-dropdown">


                        <img src="{{ asset('assets/images/avatar.png') }}"
                            alt="Profile Image"
                            class="navbar-profile-img">


                        <span class="navbar-profile-name d-none d-md-inline">
                            Administrator
                        </span>


                        <i class="bi bi-chevron-down navbar-profile-caret"></i>

                    </button>



                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-profile"
                        aria-labelledby="profile-dropdown">


                        <li class="dropdown-header">
                            Selamat Datang!
                        </li>


                        <li>

                            <a class="dropdown-item"
                                href="{{ route('admin.profile') }}">

                                <i class="bi bi-person"></i>

                                Profile Sekolah

                            </a>

                        </li>


                        <li>

                            <a class="dropdown-item"
                                href="#">

                                <i class="bi bi-gear"></i>

                                Pengaturan

                            </a>

                        </li>


                        <li>

                            <a class="dropdown-item"
                                href="#">

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

        <!-- ==========================================
             END: NAVBAR
             ========================================== -->



        <!-- ==========================================
             START: MAIN CONTENT
             ========================================== -->

        <div class="main-content">

            <div class="page-content">

                <div class="container-fluid">

                    @yield('content')

                </div>

            </div>

        </div>

        <!-- ==========================================
             END: MAIN CONTENT
             ========================================== -->



        <!-- ==========================================
             START: FOOTER
             ========================================== -->

        <footer class="footer-custom">

            <div class="footer-left">


                <span class="footer-logo">

                    <i class="bi bi-building"></i>

                    Sistem Informasi Sekolah

                </span>


                <span class="footer-separator">
                    |
                </span>


                <span class="footer-copy">

                    &copy; {{ date('Y') }}

                    Sistem Informasi Sekolah

                    <i class="bi bi-heart-fill text-danger footer-heart"></i>

                    <span class="ms-1">
                        All Rights Reserved.
                    </span>

                </span>

            </div>



            <div class="footer-right">

                <ul class="footer-links">

                    <li>

                        <a href="{{ url('/dashboard') }}"
                            class="footer-link">

                            Dashboard

                        </a>

                    </li>


                    <li>

                        <a href="{{ route('admin.profile') }}"
                            class="footer-link">

                            Profile Sekolah

                        </a>

                    </li>


                    <li>

                        <a href="#"
                            class="footer-link">

                            Bantuan

                        </a>

                    </li>


                    <li>

                        <a href="#"
                            class="footer-link">

                            Status
                            <span class="status-dot"></span>

                        </a>

                    </li>

                </ul>

            </div>

        </footer>

        <!-- ==========================================
             END: FOOTER
             ========================================== -->


    </div>

    <!-- ==========================================
         END: MAIN WRAPPER
         ========================================== -->



    <!-- ==========================================
         JAVASCRIPT
         ========================================== -->

    <!-- Bootstrap -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- ApexCharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Flatpickr -->
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Dashboard JS -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

</body>

</html>
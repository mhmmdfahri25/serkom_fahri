@php
    use App\Models\ProfileSekolah;

    $sekolah = ProfileSekolah::first();
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-bar-rating/css-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">

    <link rel="shortcut icon"
          href="{{ $sekolah && $sekolah->logo
              ? asset('uploads/sekolah/' . $sekolah->logo)
              : asset('assets/images/logosman1samarinda.png') }}">

    <style>
        /* SIDEBAR */
        #sidebar {
            background: #ffffff !important;
            border-right: 1px solid #e9ecef;
        }

        #sidebar .nav {
            padding-top: 5px;
        }

        #sidebar .nav > .nav-item {
            background: transparent !important;
            margin: 2px 12px;
        }

        #sidebar .nav > .nav-item:first-child {
            margin-top: 8px;
            margin-bottom: 15px;
        }

        #sidebar .nav > .nav-item > .nav-link {
            background: transparent !important;
            color: #333 !important;
            border-radius: 4px;
            padding: 12px 15px;
            transition: all 0.2s ease;
        }

        #sidebar .nav > .nav-item > .nav-link .menu-icon,
        #sidebar .nav > .nav-item > .nav-link .menu-title {
            color: #333 !important;
        }

        #sidebar .nav > .nav-item > .nav-link .menu-icon {
            font-size: 20px;
            margin-right: 12px;
        }

        #sidebar .nav > .nav-item > .nav-link:hover {
            background: #f1f3f5 !important;
            color: #333 !important;
        }

        #sidebar .nav > .nav-item > .nav-link:hover .menu-icon,
        #sidebar .nav > .nav-item > .nav-link:hover .menu-title {
            color: #333 !important;
        }

        #sidebar .nav > .nav-item > .nav-link.active {
            background: #4b6fe8 !important;
            color: #fff !important;
            box-shadow: none !important;
        }

        #sidebar .nav > .nav-item > .nav-link.active .menu-icon,
        #sidebar .nav > .nav-item > .nav-link.active .menu-title {
            color: #fff !important;
        }

        #sidebar .nav > .nav-item > .nav-link.active:hover {
            background: #4b6fe8 !important;
            color: #fff !important;
        }

        #sidebar .nav > .nav-item > .nav-link.active:hover .menu-icon,
        #sidebar .nav > .nav-item > .nav-link.active:hover .menu-title {
            color: #fff !important;
        }

        /* LOGO SIDEBAR */
        #sidebar .sidebar-brand-logo {
            display: block;
            margin: 0 auto;
            max-width: 100px;
            height: auto;
            object-fit: contain;
        }

        #sidebar .sidebar-brand-logomini {
            display: none;
            object-fit: contain;
        }

        #sidebar .small {
            text-align: center;
            color: #6c757d;
            font-size: 12px;
            margin-top: 5px;
        }

        /* LOGOUT */
        #sidebar .nav > .nav-item:last-child {
            margin-top: 8px;
        }

        #sidebar .nav > .nav-item:last-child .nav-link {
            cursor: pointer;
        }

        #sidebar .nav > .nav-item:last-child .nav-link:hover {
            background: #f1f3f5 !important;
        }

        /* SAAT SIDEBAR DI-MINIMIZE */
        .sidebar-icon-only #sidebar .nav > .nav-item {
            margin-left: 8px;
            margin-right: 8px;
        }

        .sidebar-icon-only #sidebar .nav > .nav-item > .nav-link {
            padding: 12px 10px;
            justify-content: center;
        }

        .sidebar-icon-only #sidebar .sidebar-brand-logo,
        .sidebar-icon-only #sidebar .small {
            display: none;
        }

        .sidebar-icon-only #sidebar .sidebar-brand-logomini {
            display: block;
            margin: 0 auto;
            width: 35px;
            height: 35px;
        }

        .sidebar-icon-only #sidebar .nav > .nav-item > .nav-link .menu-icon {
            margin-right: 0;
        }
    </style>
</head>

<body>

<div class="container-scroller">

    <!-- SIDEBAR -->
    <nav class="sidebar sidebar-offcanvas fixed" id="sidebar">

        <ul class="nav">

            <!-- LOGO SEKOLAH -->
            <li class="nav-item pt-3">

                <div class="nav-link d-block">

                    <img class="sidebar-brand-logo img-fluid"
                         src="{{ $sekolah && $sekolah->logo
                            ? asset('uploads/sekolah/' . $sekolah->logo)
                            : asset('assets/images/logosman1samarinda.png') }}"
                         alt="Logo Sekolah"
                         width="100">

                    <img class="sidebar-brand-logomini"
                         src="{{ $sekolah && $sekolah->logo
                            ? asset('uploads/sekolah/' . $sekolah->logo)
                            : asset('assets/images/logo-mini.svg') }}"
                         alt="Logo Sekolah">

                    <div class="small font-weight-light pt-1">
                        {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}
                    </div>

                </div>

            </li>

            <!-- DASHBOARD -->
            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                   href="{{ route('admin.dashboard') }}">

                    <i class="mdi mdi-compass-outline menu-icon"></i>

                    <span class="menu-title">
                        Dashboard
                    </span>

                </a>

            </li>

            <!-- PROFILE SEKOLAH -->
            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.profil-sekolah*') ? 'active' : '' }}"
                   href="{{ route('admin.profil-sekolah') }}">

                    <i class="mdi mdi-school menu-icon"></i>

                    <span class="menu-title">
                        Profile Sekolah
                    </span>

                </a>

            </li>

            <!-- BERITA -->
            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.berita*') ? 'active' : '' }}"
                   href="{{ route('admin.berita') }}">

                    <i class="mdi mdi-newspaper menu-icon"></i>

                    <span class="menu-title">
                        Berita
                    </span>

                </a>

            </li>

            <!-- EKSTRAKULIKULER -->
            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.ekstrakulikuler*') ? 'active' : '' }}"
                   href="{{ route('admin.ekstrakulikuler') }}">

                    <i class="mdi mdi-soccer menu-icon"></i>

                    <span class="menu-title">
                        Ekstrakulikuler
                    </span>

                </a>

            </li>

            <!-- GALERI -->
            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}"
                   href="{{ route('admin.galeri') }}">

                    <i class="mdi mdi-image-multiple menu-icon"></i>

                    <span class="menu-title">
                        Galeri
                    </span>

                </a>

            </li>

            <!-- GURU -->
            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.guru*') ? 'active' : '' }}"
                   href="{{ route('admin.guru.index') }}">

                    <i class="mdi mdi-account-tie menu-icon"></i>

                    <span class="menu-title">
                        Guru
                    </span>

                </a>

            </li>

            <!-- SISWA -->
            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.siswa*') ? 'active' : '' }}"
                   href="{{ route('admin.siswa.index') }}">

                    <i class="mdi mdi-account-group menu-icon"></i>

                    <span class="menu-title">
                        Siswa
                    </span>

                </a>

            </li>

            <!-- USER -->
            @if(auth()->user()->role === 'admin')

                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('admin.user*') ? 'active' : '' }}"
                       href="{{ route('admin.user.index') }}">

                        <i class="mdi mdi-account-multiple menu-icon"></i>

                        <span class="menu-title">
                            Data User
                        </span>

                    </a>

                </li>

            @endif

            <!-- LOGOUT -->
            <li class="nav-item">

                <form action="{{ route('logout') }}"
                      method="POST"
                      class="m-0">

                    @csrf

                    <button type="submit"
                            class="nav-link border-0 bg-transparent w-100 text-left">

                        <i class="mdi mdi-logout menu-icon"></i>

                        <span class="menu-title">
                            Logout
                        </span>

                    </button>

                </form>

            </li>

        </ul>

    </nav>

    <!-- PAGE BODY -->
    <div class="container-fluid page-body-wrapper">

        <!-- SETTINGS -->
        <div id="settings-trigger">
            <i class="mdi mdi-settings"></i>
        </div>

        <div id="theme-settings" class="settings-panel">

            <i class="settings-close mdi mdi-close"></i>

            <p class="settings-heading">
                SIDEBAR SKINS
            </p>

            <div class="sidebar-bg-options selected"
                 id="sidebar-default-theme">

                <div class="img-ss rounded-circle bg-light border mr-3"></div>

                Default

            </div>

            <div class="sidebar-bg-options"
                 id="sidebar-dark-theme">

                <div class="img-ss rounded-circle bg-dark border mr-3"></div>

                Dark

            </div>

            <p class="settings-heading mt-2">
                HEADER SKINS
            </p>

            <div class="color-tiles mx-0 px-4">

                <div class="tiles default primary"></div>

                <div class="tiles success"></div>

                <div class="tiles warning"></div>

                <div class="tiles danger"></div>

                <div class="tiles info"></div>

                <div class="tiles dark"></div>

                <div class="tiles light"></div>

            </div>

        </div>

        <!-- NAVBAR -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

            <div class="navbar-menu-wrapper d-flex align-items-stretch">

                <button class="navbar-toggler navbar-toggler align-self-center"
                        type="button"
                        data-toggle="minimize">

                    <span class="mdi mdi-chevron-double-left"></span>

                </button>

                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

                    <a class="navbar-brand brand-logo-mini"
                       href="{{ route('admin.dashboard') }}">

                        <img src="{{ $sekolah && $sekolah->logo
                            ? asset('uploads/sekolah/' . $sekolah->logo)
                            : asset('assets/images/logo-mini.svg') }}"
                             alt="logo">

                    </a>

                </div>

                <!-- NAVBAR LEFT -->
                <ul class="navbar-nav">

                    <li class="nav-item dropdown">

                        <a class="nav-link"
                           id="messageDropdown"
                           href="#"
                           data-toggle="dropdown"
                           aria-expanded="false">

                            <i class="mdi mdi-email-outline"></i>

                        </a>

                    </li>

                    <li class="nav-item dropdown ml-3">

                        <a class="nav-link"
                           id="notificationDropdown"
                           href="#"
                           data-toggle="dropdown">

                            <i class="mdi mdi-bell-outline"></i>

                        </a>

                    </li>

                </ul>

                <!-- NAVBAR RIGHT -->
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-logout d-none d-md-block mr-3">

                        <a class="nav-link" href="#">
                            Status
                        </a>

                    </li>

                    <li class="nav-item nav-logout d-none d-md-block">

                        <button class="btn btn-sm btn-danger">

                            {{ session('admin_nama', 'Admin') }}

                        </button>

                    </li>

                    <li class="nav-item nav-profile dropdown d-none d-md-block">

                        <a class="nav-link dropdown-toggle"
                           id="profileDropdown"
                           href="#"
                           data-toggle="dropdown"
                           aria-expanded="false">

                            <div class="nav-profile-text">
                                Indonesia
                            </div>

                        </a>

                        <div class="dropdown-menu center navbar-dropdown"
                             aria-labelledby="profileDropdown">

                            <a class="dropdown-item" href="#">

                                <i class="flag-icon flag-icon-id mr-3"></i>

                                Indonesia

                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="#">

                                <i class="flag-icon flag-icon-us mr-3"></i>

                                English

                            </a>

                        </div>

                    </li>

                    <li class="nav-item nav-logout d-none d-lg-block">

                        <a class="nav-link"
                           href="{{ route('admin.dashboard') }}">

                            <i class="mdi mdi-home-circle"></i>

                        </a>

                    </li>

                </ul>

                <!-- MOBILE MENU -->
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
                        type="button"
                        data-toggle="offcanvas">

                    <span class="mdi mdi-menu"></span>

                </button>

            </div>

        </nav>

        <!-- CONTENT -->
        <div class="main-panel">

            <div class="content-wrapper">

                @yield('content')

            </div>

        </div>

    </div>

</div>

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>

@stack('scripts')

<script src="{{ asset('assets/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/vendors/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/vendors/flot/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
<script src="{{ asset('assets/vendors/flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>

</body>
</html>

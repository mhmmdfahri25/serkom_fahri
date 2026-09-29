<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> SMAN 1 SAMARINDA </title>

    <!-- ===================================================== -->
    <!-- PLUGINS CSS -->
    <!-- ===================================================== -->

    <link rel="stylesheet"
          href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/vendors/jquery-bar-rating/css-stars.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">

    <!-- ===================================================== -->
    <!-- DATATABLES CSS -->
    <!-- ===================================================== -->

    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">

    <!-- ===================================================== -->
    <!-- LAYOUT CSS -->
    <!-- ===================================================== -->

    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">

    <!-- ===================================================== -->
    <!-- FAVICON -->
    <!-- ===================================================== -->

    <link rel="shortcut icon" href="{{ asset('assets/images/logosman1samarinda.png') }}">

    <style>
        /* Reset warna semua item sidebar */
        #sidebar .nav > .nav-item,
        #sidebar .nav > .nav-item.active {
            background: transparent !important;
        }

        #sidebar .nav > .nav-item > .nav-link,
        #sidebar .nav > .nav-item.active > .nav-link {
            background: transparent !important;
            color: #333 !important;
        }

        #sidebar .nav > .nav-item > .nav-link .menu-icon,
        #sidebar .nav > .nav-item > .nav-link .menu-title {
            color: #333 !important;
        }

        /* Hanya link yang benar-benar aktif yang biru */
        #sidebar .nav > .nav-item > .nav-link.active {
            background: #4b6fe8 !important;
            color: #fff !important;
        }

        #sidebar .nav > .nav-item > .nav-link.active .menu-icon,
        #sidebar .nav > .nav-item > .nav-link.active .menu-title {
            color: #fff !important;
        }

        /* Hover tidak membuat seluruh item menjadi biru */
        #sidebar .nav > .nav-item > .nav-link:hover {
            background: #f1f3f5 !important;
            color: #333 !important;
        }

        #sidebar .nav > .nav-item > .nav-link.active:hover {
            background: #4b6fe8 !important;
            color: #fff !important;
        }
    </style>

</head>

<body>

<div class="container-scroller">

    <!-- ===================================================== -->
    <!-- SIDEBAR -->
    <!-- ===================================================== -->
    <nav class="sidebar sidebar-offcanvas fixed" id="sidebar">
        <ul class="nav">

            <!-- ===================================================== -->
            <!-- LOGO SEKOLAH -->
            <!-- ===================================================== -->

            <li class="nav-item pt-3">
                <div class="nav-link d-block">
                        <img
                            class="sidebar-brand-logo img-fluid"
                            src="{{ asset('assets/images/logosman1samarinda.png') }}"
                            alt="Logo Sekolah"
                            width="100">
                    <!-- LOGO MINI -->
                    <img
                        class="sidebar-brand-logomini"
                        src="{{ asset('assets/images/') }}"
                        alt="logo">
                    <!-- NAMA SEKOLAH -->
                    <div class="small font-weight-light pt-1">
                        {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}
                    </div>
                </div>
            </li>


           <!-- ===================================================== -->
            <!-- DASHBOARD -->
            <!-- ===================================================== -->

            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}">

                    <i class="mdi mdi-compass-outline menu-icon"></i>

                    <span class="menu-title">
                        Dashboard
                    </span>

                </a>

            </li>


            <!-- ===================================================== -->
            <!-- PROFILE SEKOLAH -->
            <!-- ===================================================== -->

            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.profile*') ? 'active' : '' }}"
                href="{{ route('admin.profile') }}">

                    <i class="mdi mdi-school menu-icon"></i>

                    <span class="menu-title">
                        Profile Sekolah
                    </span>

                </a>

            </li>


            <!-- ===================================================== -->
            <!-- BERITA -->
            <!-- ===================================================== -->

            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.berita*') ? 'active' : '' }}"
                href="{{ route('admin.berita') }}">

                    <i class="mdi mdi-newspaper menu-icon"></i>

                    <span class="menu-title">
                        Berita
                    </span>

                </a>

            </li>


            <!-- ===================================================== -->
            <!-- EKSTRAKULIKULER -->
            <!-- ===================================================== -->

            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.ekstrakulikuler*') ? 'active' : '' }}"
                href="{{ route('admin.ekstrakulikuler') }}">

                    <i class="mdi mdi-soccer menu-icon"></i>

                    <span class="menu-title">
                        Ekstrakulikuler
                    </span>

                </a>

            </li>


            <!-- ===================================================== -->
            <!-- GALERI -->
            <!-- ===================================================== -->

            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}"
                href="{{ route('admin.galeri') }}">

                    <i class="mdi mdi-image-multiple menu-icon"></i>

                    <span class="menu-title">
                        Galeri
                    </span>

                </a>

            </li>


            <!-- ===================================================== -->
            <!-- GURU -->
            <!-- ===================================================== -->

            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.guru*') ? 'active' : '' }}"
                href="{{ route('admin.guru') }}">

                    <i class="mdi mdi-account-tie menu-icon"></i>

                    <span class="menu-title">
                        Guru
                    </span>

                </a>

            </li>


            <!-- ===================================================== -->
            <!-- SISWA -->
            <!-- ===================================================== -->

            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.siswa*') ? 'active' : '' }}"
                href="{{ route('admin.siswa') }}">

                    <i class="mdi mdi-account-group menu-icon"></i>

                    <span class="menu-title">
                        Siswa
                    </span>
                </a>

            </li>


            <!-- ===================================================== -->
            <!-- logout -->
            <!-- ===================================================== -->

            <li class="nav-item">
                <a class="nav-lik" href="{{route('logout')}}">
                     <i class="mdi mdi-logout"></i>
                     <span class="menu-title">
                        Logout
                     </span>
                </a>
            </li>

        </ul>
    </nav>


    <!-- ===================================================== -->
    <!-- PAGE BODY -->
    <!-- ===================================================== -->

    <div class="container-fluid page-body-wrapper">


        <!-- ===================================================== -->
        <!-- SETTINGS -->
        <!-- ===================================================== -->

        <div id="settings-trigger">

            <i class="mdi mdi-settings"></i>

        </div>


        <div id="theme-settings"
             class="settings-panel">

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



        <!-- ===================================================== -->
        <!-- NAVBAR -->
        <!-- ===================================================== -->

        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

            <div class="navbar-menu-wrapper d-flex align-items-stretch">


                <!-- MINIMIZE -->

                <button class="navbar-toggler navbar-toggler align-self-center"
                        type="button"
                        data-toggle="minimize">

                    <span class="mdi mdi-chevron-double-left"></span>

                </button>


                <!-- LOGO MINI -->

                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

                    <a class="navbar-brand brand-logo-mini"
                       href="{{ route('admin.dashboard') }}">

                        <img src="{{ asset('assets/images/logo-mini.svg') }}"
                             alt="logo">

                    </a>

                </div>


                <!-- ===================================================== -->
                <!-- NAVBAR LEFT -->
                <!-- ===================================================== -->

                <ul class="navbar-nav">


                    <!-- MESSAGE -->

                    <li class="nav-item dropdown">

                        <a class="nav-link"
                           id="messageDropdown"
                           href="#"
                           data-toggle="dropdown"
                           aria-expanded="false">

                            <i class="mdi mdi-email-outline"></i>

                        </a>

                    </li>


                    <!-- NOTIFICATION -->

                    <li class="nav-item dropdown ml-3">

                        <a class="nav-link"
                           id="notificationDropdown"
                           href="#"
                           data-toggle="dropdown">

                            <i class="mdi mdi-bell-outline"></i>

                        </a>

                    </li>

                </ul>



                <!-- ===================================================== -->
                <!-- NAVBAR RIGHT -->
                <!-- ===================================================== -->

                <ul class="navbar-nav navbar-nav-right">


                    <!-- STATUS -->

                    <li class="nav-item nav-logout d-none d-md-block mr-3">

                        <a class="nav-link"
                           href="#">

                            Status

                        </a>

                    </li>


                    <!-- USER NAME -->

                    <li class="nav-item nav-logout d-none d-md-block">

                        <button class="btn btn-sm btn-danger">

                            {{ session('admin_nama', 'Admin') }}

                        </button>

                    </li>


                    <!-- LANGUAGE -->

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


                            <a class="dropdown-item"
                               href="#">

                                <i class="flag-icon flag-icon-id mr-3"></i>

                                Indonesia

                            </a>


                            <div class="dropdown-divider"></div>


                            <a class="dropdown-item"
                               href="#">

                                <i class="flag-icon flag-icon-us mr-3"></i>

                                English

                            </a>

                        </div>

                    </li>


                    <!-- HOME -->

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



        <!-- ===================================================== -->
        <!-- CONTENT -->
        <!-- ===================================================== -->

        <div class="main-panel">

            <div class="content-wrapper">

                @yield('content')

            </div>

        </div>


    </div>

</div>



<!-- ===================================================== -->
<!-- JAVASCRIPT -->
<!-- ===================================================== -->


<!-- JQUERY + BOOTSTRAP -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>


<!-- ===================================================== -->
<!-- DATATABLES JS -->
<!-- ===================================================== -->

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>


<!-- ===================================================== -->
<!-- STACK UNTUK SCRIPT HALAMAN -->
<!-- ===================================================== -->

@stack('scripts')


<!-- ===================================================== -->
<!-- PLUGINS JS -->
<!-- ===================================================== -->

<script src="{{ asset('assets/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>

<script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('assets/vendors/flot/jquery.flot.js') }}"></script>

<script src="{{ asset('assets/vendors/flot/jquery.flot.resize.js') }}"></script>

<script src="{{ asset('assets/vendors/flot/jquery.flot.categories.js') }}"></script>

<script src="{{ asset('assets/vendors/flot/jquery.flot.fillbetween.js') }}"></script>

<script src="{{ asset('assets/vendors/flot/jquery.flot.stack.js') }}"></script>


<!-- ===================================================== -->
<!-- TEMPLATE JS -->
<!-- ===================================================== -->

<script src="{{ asset('assets/js/off-canvas.js') }}"></script>

<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>

<script src="{{ asset('assets/js/misc.js') }}"></script>

<script src="{{ asset('assets/js/settings.js') }}"></script>

<script src="{{ asset('assets/js/todolist.js') }}"></script>

<script src="{{ asset('assets/js/dashboard.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');

    if (!sidebar) return;

    // Hapus active dari parent li yang mungkin ditambahkan JS template.
    sidebar.querySelectorAll('.nav > .nav-item').forEach(function (item) {
        item.classList.remove('active');
    });
});
</script>



</body>

</html>

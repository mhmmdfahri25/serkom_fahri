@extends('index')

@section('content')

{{-- ==========================================
     NOTIFIKASI
========================================== --}}

@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        <i class="mdi mdi-check-circle-outline mr-2"></i>

        {{ session('success') }}

        <button type="button"
                class="close"
                data-dismiss="alert">

            <span>&times;</span>

        </button>

    </div>

@endif


{{-- ==========================================
     HEADER PROFILE SEKOLAH
========================================== --}}

<div class="row">

    <div class="col-12">

        <div class="card mb-4">

            <div class="card-body">

                <div class="row align-items-center">

                    {{-- LOGO --}}

                    <div class="col-md-2 text-center mb-3 mb-md-0">

                        @if($sekolah && $sekolah->logo)

                            <img
                                src="{{ asset('uploads/sekolah/' . $sekolah->logo) }}"
                                alt="Logo Sekolah"
                                class="img-fluid"
                                width="120"
                            >

                        @else

                            <img
                                src="{{ asset('assets/images/logo.svg') }}"
                                alt="Logo Sekolah"
                                class="img-fluid"
                                width="120"
                            >

                        @endif

                    </div>


                    {{-- INFORMASI UTAMA --}}

                    <div class="col-md-7">

                        <h3 class="font-weight-bold mb-2">

                            {{ $sekolah->nama_sekolah ?? 'Nama Sekolah' }}

                        </h3>

                        <p class="text-muted mb-3">

                            <i class="mdi mdi-school-outline mr-1"></i>

                            Profil dan informasi sekolah

                        </p>

                        <span class="badge badge-gradient-primary">

                            <i class="mdi mdi-school mr-1"></i>

                            Sekolah

                        </span>

                    </div>


                    {{-- BUTTON EDIT --}}

                    <div class="col-md-3 text-md-right mt-3 mt-md-0">

                        <a
                            href="{{ route('admin.profile.edit') }}"
                            class="btn btn-gradient-primary"
                        >

                            <i class="mdi mdi-pencil mr-1"></i>

                            Edit Profile

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



{{-- ==========================================
     FOTO SEKOLAH
========================================== --}}

@if($sekolah && $sekolah->foto)

<div class="row">

    <div class="col-12">

        <div class="card mb-4">

            <div class="card-body">

                <div class="row align-items-center">

                    {{-- JUDUL --}}

                    <div class="col-md-4 mb-3 mb-md-0">

                        <h4 class="card-title mb-2">

                            <i class="mdi mdi-image-outline text-primary mr-2"></i>

                            Foto Sekolah

                        </h4>

                        <p class="text-muted mb-0">

                            Foto yang digunakan sebagai
                            dokumentasi profile sekolah.

                        </p>

                    </div>


                    {{-- FOTO --}}

                    <div class="col-md-8 text-center">

                        <img
                            src="{{ asset('uploads/sekolah/' . $sekolah->foto) }}"
                            alt="Foto Sekolah"
                            class="img-fluid rounded"
                            width="500"
                        >

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endif



{{-- ==========================================
     INFORMASI SEKOLAH
========================================== --}}

<div class="row">

    <div class="col-12">

        <div class="card mb-4">

            <div class="card-body">

                <div class="d-flex align-items-center mb-4">

                    <i class="mdi mdi-information-outline text-primary mr-2"
                       style="font-size: 24px;"></i>

                    <div>

                        <h4 class="card-title mb-1">

                            Informasi Sekolah

                        </h4>

                        <p class="text-muted mb-0">

                            Informasi dasar mengenai sekolah

                        </p>

                    </div>

                </div>


                <div class="row">


                    {{-- NAMA SEKOLAH --}}

                    <div class="col-md-6 mb-4">

                        <div class="d-flex">

                            <i class="mdi mdi-school-outline text-primary mr-3"
                               style="font-size: 22px;"></i>

                            <div>

                                <small class="text-muted d-block">
                                    Nama Sekolah
                                </small>

                                <h6 class="font-weight-bold mb-0">

                                    {{ $sekolah->nama_sekolah ?? '-' }}

                                </h6>

                            </div>

                        </div>

                    </div>


                    {{-- KEPALA SEKOLAH --}}

                    <div class="col-md-6 mb-4">

                        <div class="d-flex">

                            <i class="mdi mdi-account-tie text-primary mr-3"
                               style="font-size: 22px;"></i>

                            <div>

                                <small class="text-muted d-block">
                                    Kepala Sekolah
                                </small>

                                <h6 class="font-weight-bold mb-0">

                                    {{ $sekolah->kepala_sekolah ?? '-' }}

                                </h6>

                            </div>

                        </div>

                    </div>


                    {{-- TAHUN BERDIRI --}}

                    <div class="col-md-6 mb-4">

                        <div class="d-flex">

                            <i class="mdi mdi-calendar-outline text-primary mr-3"
                               style="font-size: 22px;"></i>

                            <div>

                                <small class="text-muted d-block">
                                    Tahun Berdiri
                                </small>

                                <h6 class="font-weight-bold mb-0">

                                    {{ $sekolah->tahun_berdiri ?? '-' }}

                                </h6>

                            </div>

                        </div>

                    </div>


                    {{-- KONTAK --}}

                    <div class="col-md-6 mb-4">

                        <div class="d-flex">

                            <i class="mdi mdi-phone-outline text-primary mr-3"
                               style="font-size: 22px;"></i>

                            <div>

                                <small class="text-muted d-block">
                                    Kontak
                                </small>

                                <h6 class="font-weight-bold mb-0">

                                    {{ $sekolah->kontak ?? '-' }}

                                </h6>

                            </div>

                        </div>

                    </div>


                    {{-- ALAMAT --}}

                    <div class="col-12">

                        <div class="d-flex">

                            <i class="mdi mdi-map-marker-outline text-primary mr-3"
                               style="font-size: 22px;"></i>

                            <div>

                                <small class="text-muted d-block">
                                    Alamat Sekolah
                                </small>

                                <h6 class="font-weight-bold mb-0">

                                    {{ $sekolah->alamat ?? '-' }}

                                </h6>

                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>

</div>



{{-- ==========================================
     DESKRIPSI
========================================== --}}

<div class="row">

    <div class="col-12">

        <div class="card mb-4">

            <div class="card-body">

                <h4 class="card-title mb-2">

                    <i class="mdi mdi-text-box-outline text-primary mr-2"></i>

                    Tentang Sekolah

                </h4>

                <p class="text-muted mb-3">

                    Deskripsi singkat mengenai sekolah

                </p>

                <div class="p-3 bg-light rounded">

                    <p class="text-muted mb-0">

                        {{ $sekolah->deskripsi ?? '-' }}

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>



{{-- ==========================================
     VISI & MISI
========================================== --}}

<div class="row">

    <div class="col-12">

        <div class="card mb-4">

            <div class="card-body">

                <h4 class="card-title mb-2">

                    <i class="mdi mdi-eye-outline text-primary mr-2"></i>

                    Visi & Misi

                </h4>

                <p class="text-muted mb-3">

                    Visi dan misi sekolah

                </p>


                <div class="p-3 bg-light rounded">

                    <p
                        class="text-muted mb-0"
                        style="white-space: pre-line;"
                    >

                        {{ $sekolah->{'visi-misi'} ?? '-' }}

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

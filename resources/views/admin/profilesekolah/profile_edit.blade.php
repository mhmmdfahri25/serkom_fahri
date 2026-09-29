@extends('index')

@section('content')

<!-- ==========================================
     HEADER
========================================== -->

<div class="row">

    <div class="col-12">

        <div class="card mb-4">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h4 class="card-title mb-1">
                            <i class="mdi mdi-school-outline text-primary mr-2"></i>
                            Edit Profile Sekolah
                        </h4>

                        <p class="card-description mb-0">
                            Perbarui informasi profile sekolah
                        </p>

                    </div>

                    <a href="{{ route('admin.profile') }}"
                       class="btn btn-light">

                        <i class="mdi mdi-arrow-left mr-1"></i>
                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- ==========================================
     FORM EDIT PROFILE
========================================== -->

<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-body">

                <!-- ERROR VALIDASI -->

                @if($errors->any())

                    <div class="alert alert-danger">

                        <div class="font-weight-bold mb-2">
                            <i class="mdi mdi-alert-circle-outline mr-1"></i>
                            Terjadi kesalahan
                        </div>

                        <ul class="mb-0 pl-3">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <form
                    action="{{ route('admin.profile.update') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf
                    @method('PUT')


                    <!-- ==================================
                         IDENTITAS SEKOLAH
                    ================================== -->

                    <h5 class="font-weight-bold mb-3">

                        <i class="mdi mdi-information-outline text-primary mr-2"></i>

                        Identitas Sekolah

                    </h5>


                    <div class="row">


                        <!-- NAMA SEKOLAH -->

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Nama Sekolah
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="nama_sekolah"
                                    class="form-control"
                                    value="{{ old('nama_sekolah', $sekolah->nama_sekolah ?? '') }}"
                                    placeholder="Masukkan nama sekolah"
                                    required
                                >

                            </div>

                        </div>


                        <!-- KEPALA SEKOLAH -->

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Kepala Sekolah
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="kepala_sekolah"
                                    class="form-control"
                                    value="{{ old('kepala_sekolah', $sekolah->kepala_sekolah ?? '') }}"
                                    placeholder="Masukkan nama kepala sekolah"
                                    required
                                >

                            </div>

                        </div>


                        <!-- TAHUN BERDIRI -->

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Tahun Berdiri
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="number"
                                    name="tahun_berdiri"
                                    class="form-control"
                                    value="{{ old('tahun_berdiri', $sekolah->tahun_berdiri ?? '') }}"
                                    placeholder="Contoh: 1965"
                                    min="1900"
                                    max="2100"
                                    required
                                >

                            </div>

                        </div>


                        <!-- KONTAK -->

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Kontak
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="kontak"
                                    class="form-control"
                                    value="{{ old('kontak', $sekolah->kontak ?? '') }}"
                                    placeholder="Contoh: 08123456789"
                                    required
                                >

                            </div>

                        </div>


                        <!-- ALAMAT -->

                        <div class="col-12">

                            <div class="form-group">

                                <label>
                                    Alamat Sekolah
                                    <span class="text-danger">*</span>
                                </label>

                                <textarea
                                    name="alamat"
                                    class="form-control"
                                    rows="3"
                                    placeholder="Masukkan alamat sekolah"
                                    required
                                >{{ old('alamat', $sekolah->alamat ?? '') }}</textarea>

                            </div>

                        </div>

                    </div>


                    <hr class="my-4">


                    <!-- ==================================
                         DESKRIPSI
                    ================================== -->

                    <h5 class="font-weight-bold mb-3">

                        <i class="mdi mdi-text-box-outline text-primary mr-2"></i>

                        Deskripsi Sekolah

                    </h5>


                    <div class="form-group">

                        <label>
                            Deskripsi
                            <span class="text-danger">*</span>
                        </label>

                        <textarea
                            name="deskripsi"
                            class="form-control"
                            rows="5"
                            placeholder="Masukkan deskripsi sekolah"
                            required
                        >{{ old('deskripsi', $sekolah->deskripsi ?? '') }}</textarea>

                    </div>


                    <hr class="my-4">


                    <!-- ==================================
                         VISI & MISI
                    ================================== -->

                    <h5 class="font-weight-bold mb-3">

                        <i class="mdi mdi-eye-outline text-primary mr-2"></i>

                        Visi & Misi

                    </h5>


                    <div class="form-group">

                        <label>
                            Visi & Misi
                            <span class="text-danger">*</span>
                        </label>

                        <textarea
                            name="visi-misi"
                            class="form-control"
                            rows="6"
                            placeholder="Masukkan visi dan misi sekolah"
                            required
                        >{{ old('visi-misi', $sekolah->{'visi-misi'} ?? '') }}</textarea>

                        <small class="form-text text-muted">

                            Pisahkan visi dan misi menggunakan baris baru
                            jika diperlukan.

                        </small>

                    </div>


                    <hr class="my-4">


                    <!-- ==================================
                         FOTO & LOGO
                    ================================== -->

                    <h5 class="font-weight-bold mb-3">

                        <i class="mdi mdi-image-multiple-outline text-primary mr-2"></i>

                        Foto & Logo Sekolah

                    </h5>


                    <div class="row">


                        <!-- FOTO -->

                        <div class="col-md-6">

                            <div class="card border mb-3">

                                <div class="card-body">

                                    <h6 class="font-weight-bold mb-3">

                                        Foto Sekolah

                                    </h6>


                                    @if(!empty($sekolah->foto))

                                        <div class="text-center mb-3">

                                            <img
                                                src="{{ asset('uploads/sekolah/' . $sekolah->foto) }}"
                                                alt="Foto Sekolah"
                                                class="img-fluid rounded"
                                                style="max-height: 180px;"
                                            >

                                        </div>

                                    @endif


                                    <input
                                        type="file"
                                        name="foto"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.webp"
                                    >

                                    <small class="form-text text-muted">

                                        Format: JPG, JPEG, PNG, WEBP.
                                        Maksimal 2 MB.

                                    </small>

                                </div>

                            </div>

                        </div>


                        <!-- LOGO -->

                        <div class="col-md-6">

                            <div class="card border mb-3">

                                <div class="card-body">

                                    <h6 class="font-weight-bold mb-3">

                                        Logo Sekolah

                                    </h6>


                                    @if(!empty($sekolah->logo))

                                        <div class="text-center mb-3">

                                            <img
                                                src="{{ asset('uploads/sekolah/' . $sekolah->logo) }}"
                                                alt="Logo Sekolah"
                                                class="img-fluid"
                                                style="max-height: 180px;"
                                            >

                                        </div>

                                    @endif


                                    <input
                                        type="file"
                                        name="logo"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.webp,.svg"
                                    >

                                    <small class="form-text text-muted">

                                        Format: JPG, JPEG, PNG, WEBP, SVG.
                                        Maksimal 2 MB.

                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- ==================================
                         BUTTON
                    ================================== -->

                    <div class="d-flex justify-content-end mt-4">

                        <a
                            href="{{ route('admin.profile') }}"
                            class="btn btn-light mr-2"
                        >

                            <i class="mdi mdi-close mr-1"></i>

                            Batal

                        </a>


                        <button
                            type="submit"
                            class="btn btn-gradient-primary"
                        >

                            <i class="mdi mdi-content-save mr-1"></i>

                            Simpan Perubahan

                        </button>

                    </div>


                </form>

            </div>

        </div>

    </div>

</div>

@endsection

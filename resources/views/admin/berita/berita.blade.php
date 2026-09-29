@extends('index')

@section('content')

<div class="row">
    <div class="col-12">

        {{-- HEADER --}}
        <div class="card mb-4">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h4 class="card-title mb-1">
                            Data Berita
                        </h4>

                        <p class="text-muted mb-0">
                            Kelola berita sekolah
                        </p>
                    </div>

                    <a href="{{ route('admin.berita.tambah') }}"
                       class="btn btn-primary">

                        <i class="mdi mdi-plus"></i>

                        Tambah Berita

                    </a>

                </div>

            </div>

        </div>


        {{-- PESAN SUCCESS --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show"
                 role="alert">

                <i class="mdi mdi-check-circle"></i>

                {{ session('success') }}

                <button type="button"
                        class="close"
                        data-dismiss="alert">

                    <span>&times;</span>

                </button>

            </div>

        @endif


        {{-- PESAN ERROR --}}
        @if(session('error'))

            <div class="alert alert-danger alert-dismissible fade show"
                 role="alert">

                <i class="mdi mdi-alert-circle"></i>

                {{ session('error') }}

                <button type="button"
                        class="close"
                        data-dismiss="alert">

                    <span>&times;</span>

                </button>

            </div>

        @endif


        {{-- DAFTAR BERITA --}}
        <div class="row">

            @forelse($beritas as $berita)

                <div class="col-xl-4 col-lg-6 col-md-6 mb-4">

                    <div class="card h-100 shadow-sm">


                        {{-- FOTO --}}
                        @if($berita->foto)

                            <img src="{{ asset('uploads/berita/' . $berita->foto) }}"
                                 class="card-img-top"
                                 alt="{{ $berita->judul }}"
                                 style="
                                    height: 220px;
                                    object-fit: cover;
                                 ">

                        @else

                            <div class="d-flex align-items-center justify-content-center bg-light"
                                 style="
                                    height: 220px;
                                 ">

                                <div class="text-center text-muted">

                                    <i class="mdi mdi-image-off"
                                       style="font-size: 50px;">
                                    </i>

                                    <p class="mb-0">
                                        Tidak ada foto
                                    </p>

                                </div>

                            </div>

                        @endif


                        {{-- ISI CARD --}}
                        <div class="card-body d-flex flex-column">


                            {{-- TANGGAL --}}
                            <div class="mb-2">

                                <small class="text-muted">

                                    <i class="mdi mdi-calendar-outline mr-1"></i>

                                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}

                                </small>

                            </div>


                            {{-- JUDUL --}}
                            <h5 class="card-title font-weight-bold">

                                {{ $berita->judul }}

                            </h5>


                            {{-- ISI BERITA --}}
                            <p class="card-text text-muted">

                                {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 120) }}

                            </p>


                            {{-- TOMBOL BACA --}}
                            <div class="mt-auto">

                               <a href="{{ route('admin.berita.detail', $berita->id) }}"
                                    class="btn btn-link p-0 text-primary">

                                         Baca selengkapnya

                                        <i class="mdi mdi-arrow-right"></i>

                                </a>

                            </div>

                        </div>


                        {{-- FOOTER CARD --}}
                        <div class="card-footer bg-white">

                            <div class="d-flex justify-content-between align-items-center">


                                {{-- EDIT --}}
                                <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="mdi mdi-pencil"></i>

                                    Edit

                                </a>


                                {{-- HAPUS --}}
                                <form action="{{ route('admin.berita.destroy', $berita->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus berita ini?')">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">

                                        <i class="mdi mdi-delete"></i>

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- MODAL DETAIL BERITA --}}
                {{-- ===================================================== --}}

                <div class="modal fade"
                     id="modalBerita{{ $berita->id }}"
                     tabindex="-1"
                     role="dialog"
                     aria-hidden="true">

                    <div class="modal-dialog modal-lg modal-dialog-centered"
                         role="document">

                        <div class="modal-content">


                            {{-- HEADER MODAL --}}
                            <div class="modal-header">

                                <h5 class="modal-title">

                                    {{ $berita->judul }}

                                </h5>

                                <button type="button"
                                        class="close"
                                        data-dismiss="modal">

                                    <span>&times;</span>

                                </button>

                            </div>


                            {{-- BODY --}}
                            <div class="modal-body">


                                {{-- FOTO --}}
                                @if($berita->foto)

                                    <img src="{{ asset('uploads/berita/' . $berita->foto) }}"
                                         class="img-fluid rounded mb-4 w-100"
                                         style="max-height: 450px; object-fit: cover;"
                                         alt="{{ $berita->judul }}">

                                @endif


                                {{-- TANGGAL --}}
                                <p class="text-muted mb-3">

                                    <i class="mdi mdi-calendar-outline mr-1"></i>

                                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}

                                </p>


                                {{-- JUDUL --}}
                                <h4 class="font-weight-bold mb-3">

                                    {{ $berita->judul }}

                                </h4>


                                {{-- ISI --}}
                                <div style="line-height: 1.8;">

                                    {!! nl2br(e($berita->isi)) !!}

                                </div>

                            </div>


                            {{-- FOOTER MODAL --}}
                            <div class="modal-footer">

                                <button type="button"
                                        class="btn btn-secondary"
                                        data-dismiss="modal">

                                    Tutup

                                </button>

                                <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                   class="btn btn-warning">

                                    <i class="mdi mdi-pencil"></i>

                                    Edit Berita

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                {{-- JIKA BELUM ADA BERITA --}}
                <div class="col-12">

                    <div class="card">

                        <div class="card-body text-center py-5">

                            <i class="mdi mdi-newspaper-variant-outline text-muted"
                               style="font-size: 70px;">
                            </i>

                            <h4 class="mt-3">
                                Belum Ada Berita
                            </h4>

                            <p class="text-muted">
                                Belum ada berita sekolah yang ditambahkan.
                            </p>

                            <a href="{{ route('admin.berita.tambah') }}"
                               class="btn btn-primary">

                                <i class="mdi mdi-plus"></i>

                                Tambah Berita

                            </a>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>

    </div>
</div>

@endsection

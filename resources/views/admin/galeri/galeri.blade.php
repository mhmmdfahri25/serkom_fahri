@extends('index')

@section('content')

<div class="row">
    <div class="col-12">

        {{-- ALERT SUCCESS --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <i class="mdi mdi-check-circle-outline"></i>

                {{ session('success') }}

                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>
        @endif


        {{-- CARD UTAMA --}}
        <div class="card">

            <div class="card-body">

                {{-- HEADER --}}
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>

                        <h4 class="card-title mb-1">
                            Data Galeri
                        </h4>

                        <p class="text-muted mb-0">
                            Kelola foto dan video sekolah
                        </p>

                    </div>


                    <a href="{{ route('admin.galeri.tambah') }}"
                       class="btn btn-primary">

                        <i class="mdi mdi-plus"></i>

                        Tambah Galeri

                    </a>

                </div>


                {{-- GALERI --}}
                <div class="row">

                    @forelse($galeris as $galeri)

                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">

                            <div class="card border shadow-sm h-100">

                                {{-- MEDIA --}}
                                <div class="position-relative"
                                     style="height: 200px; overflow: hidden;">

                                    @if($galeri->foto && $galeri->kategori == 'foto')

                                        @if(file_exists(public_path('uploads/galeri/' . $galeri->foto)))

                                            <img
                                                src="{{ asset('uploads/galeri/' . $galeri->foto) }}"
                                                alt="{{ $galeri->judul }}"
                                                class="w-100 h-100"
                                                style="object-fit: cover;">

                                        @else

                                            <div class="d-flex align-items-center justify-content-center h-100 bg-light">

                                                <i class="mdi mdi-image-off mdi-48px text-muted"></i>

                                            </div>

                                        @endif


                                    @elseif($galeri->foto && $galeri->kategori == 'video')

                                        @if(file_exists(public_path('uploads/galeri/' . $galeri->foto)))

                                            <video
                                                class="w-100 h-100"
                                                style="object-fit: cover;"
                                                controls>

                                                <source
                                                    src="{{ asset('uploads/galeri/' . $galeri->foto) }}">

                                                Browser tidak mendukung video.

                                            </video>

                                        @else

                                            <div class="d-flex align-items-center justify-content-center h-100 bg-light">

                                                <i class="mdi mdi-video-off mdi-48px text-muted"></i>

                                            </div>

                                        @endif


                                    @else

                                        <div class="d-flex align-items-center justify-content-center h-100 bg-light">

                                            <i class="mdi mdi-image mdi-48px text-muted"></i>

                                        </div>

                                    @endif


                                    {{-- BADGE KATEGORI --}}

                                    <div style="position: absolute;
                                                top: 10px;
                                                left: 10px;">

                                        @if($galeri->kategori == 'foto')

                                            <span class="badge badge-primary">

                                                <i class="mdi mdi-image"></i>
                                                Foto

                                            </span>

                                        @else

                                            <span class="badge badge-info">

                                                <i class="mdi mdi-video"></i>
                                                Video

                                            </span>

                                        @endif

                                    </div>

                                </div>


                                {{-- ISI CARD --}}
                                <div class="card-body">

                                    <h5 class="font-weight-bold mb-2">

                                        {{ $galeri->judul }}

                                    </h5>


                                    <p class="text-muted mb-2"
                                       style="height: 45px; overflow: hidden;">

                                        {{ $galeri->keterangan }}

                                    </p>


                                    <small class="text-muted">

                                        <i class="mdi mdi-calendar"></i>

                                        {{ \Carbon\Carbon::parse($galeri->tanggal)->format('d-m-Y') }}

                                    </small>

                                </div>


                                {{-- FOOTER CARD --}}
                                <div class="card-footer bg-white border-top">

                                    <div class="d-flex justify-content-between">

                                        {{-- EDIT --}}
                                        <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
                                           class="btn btn-warning btn-sm">

                                            <i class="mdi mdi-pencil"></i>

                                            Edit

                                        </a>


                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('admin.galeri.destroy', $galeri->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data galeri ini?')">

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm">

                                                <i class="mdi mdi-delete"></i>

                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @empty

                        {{-- KALAU DATA KOSONG --}}

                        <div class="col-12">

                            <div class="text-center py-5">

                                <i class="mdi mdi-image-multiple mdi-48px text-muted"></i>

                                <h5 class="mt-3">
                                    Belum ada data galeri
                                </h5>

                                <p class="text-muted">
                                    Silakan tambahkan foto atau video sekolah.
                                </p>

                                <a href="{{ route('admin.galeri.tambah') }}"
                                   class="btn btn-primary">

                                    <i class="mdi mdi-plus"></i>

                                    Tambah Galeri

                                </a>

                            </div>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>
</div>

@endsection

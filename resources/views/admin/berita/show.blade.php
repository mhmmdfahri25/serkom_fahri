@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title mb-0">
                        <i class="mdi mdi-newspaper"></i>
                        Detail Berita
                    </h4>

                </div>

                <hr>

                <h3 class="font-weight-bold mb-2">
                    {{ $berita->judul }}
                </h3>

                <div class="text-muted mb-4">
                    <i class="mdi mdi-calendar-outline mr-1"></i>
                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                </div>

                @if($berita->foto && file_exists(public_path('uploads/berita/' . $berita->foto)))
                    <div class="text-center mb-4">
                        <img src="{{ asset('uploads/berita/' . $berita->foto) }}"
                             alt="{{ $berita->judul }}"
                             class="img-fluid rounded"
                             style="max-height: 380px; width: 100%; object-fit: cover;">
                    </div>
                @else
                    <div class="text-center mb-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                             style="height: 200px;">
                            <div class="text-muted">
                                <i class="mdi mdi-image-off mdi-48px"></i>
                                <p class="mb-0 mt-2">Tidak ada foto berita</p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="mt-4"
                     style="white-space: pre-line; line-height: 1.8;">
                    {{ $berita->isi }}
                </div>

                <hr class="mt-4">

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.berita') }}" class="btn btn-secondary">
                        <i class="mdi mdi-arrow-left"></i>
                        Kembali
                    </a>

                    <a href="{{ route('admin.berita.addEdit', \Illuminate\Support\Facades\Crypt::encrypt($berita->id)) }}"
                       class="btn btn-warning">
                        <i class="mdi mdi-pencil"></i>
                        Edit Berita
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

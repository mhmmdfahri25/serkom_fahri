@extends('public.dashboard')

@section('title', $galeri->judul . ' - ' . ($sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA'))

@section('content')

<style>
    .detail-page {
        padding: 80px 0;
        background: #f8fafc;
        min-height: 80vh;
    }

    .gallery-detail {
        max-width: 950px;
        margin: auto;
        overflow: hidden;
        border-radius: 22px;
        background: #fff;
        border: 1px solid #e5e7eb;
        box-shadow: 0 15px 40px rgba(15,23,42,.08);
    }

    .gallery-detail-image {
        width: 100%;
        max-height: 600px;
        object-fit: cover;
    }

    .gallery-detail-content {
        padding: 35px;
    }

    .gallery-detail-content h1 {
        color: #172554;
        font-weight: 800;
        margin-bottom: 15px;
    }

    .gallery-detail-content p {
        color: #64748b;
        line-height: 1.8;
    }

    .detail-info {
        padding: 15px;
        margin-top: 20px;
        border-radius: 12px;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
    }

    .detail-info strong {
        color: #172554;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-top: 20px;
        padding: 11px 20px;
        border-radius: 9px;
        background: #2563eb;
        color: #fff;
        text-decoration: none;
        font-weight: 700;
    }

    .back-btn:hover {
        background: #1d4ed8;
        color: #fff;
    }
</style>

<section class="detail-page">
    <div class="container">

        <div class="gallery-detail">

            @if($galeri->foto)
                <img src="{{ asset('uploads/galeri/'.$galeri->foto) }}"
                     class="gallery-detail-image"
                     alt="{{ $galeri->judul }}">
            @else
                <img src="{{ asset('assets/images/logosman1samarinda.png') }}"
                     class="gallery-detail-image"
                     alt="{{ $galeri->judul }}">
            @endif

            <div class="gallery-detail-content">

                <h1>{{ $galeri->judul }}</h1>

                @if($galeri->keterangan)
                    <p>{{ $galeri->keterangan }}</p>
                @endif

                <div class="detail-info">
                    <strong>
                        <i class="bi bi-tag me-1"></i>
                        Kategori:
                    </strong>
                    {{ $galeri->kategori ?? '-' }}
                </div>

                <div class="detail-info">
                    <strong>
                        <i class="bi bi-calendar3 me-1"></i>
                        Tanggal:
                    </strong>
                    {{ $galeri->tanggal ?? '-' }}
                </div>

                <a href="{{ route('public.galeri') }}" class="back-btn">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Galeri
                </a>

            </div>

        </div>

    </div>
</section>

@endsection

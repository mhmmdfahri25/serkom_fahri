@extends('public.dashboard')

@section('title', $berita->judul . ' - ' . ($sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA'))

@section('content')

<style>
    .detail-page {
        padding: 80px 0;
        background: #f8fafc;
        min-height: 80vh;
    }

    .news-detail {
        max-width: 900px;
        margin: auto;
        overflow: hidden;
        border-radius: 22px;
        background: #fff;
        border: 1px solid #e5e7eb;
        box-shadow: 0 15px 40px rgba(15,23,42,.08);
    }

    .news-detail-image {
        width: 100%;
        height: 450px;
        object-fit: cover;
    }

    .news-detail-content {
        padding: 40px;
    }

    .news-detail-date {
        color: #2563eb;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .news-detail-content h1 {
        color: #172554;
        font-weight: 800;
        margin-bottom: 25px;
    }

    .news-detail-text {
        color: #475569;
        line-height: 1.9;
        font-size: 16px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-top: 25px;
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

        <div class="news-detail">

            @if($berita->foto)
                <img src="{{ asset('uploads/berita/'.$berita->foto) }}"
                     class="news-detail-image"
                     alt="{{ $berita->judul }}">
            @else
                <img src="{{ asset('assets/images/logosman1samarinda.png') }}"
                     class="news-detail-image"
                     alt="{{ $berita->judul }}">
            @endif

            <div class="news-detail-content">

                <div class="news-detail-date">
                    <i class="bi bi-calendar3 me-1"></i>
                    {{ $berita->tanggal }}
                </div>

                <h1>{{ $berita->judul }}</h1>

                <div class="news-detail-text">
                    {!! nl2br(e($berita->isi)) !!}
                </div>

                <a href="{{ route('public.berita') }}" class="back-btn">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Berita
                </a>

            </div>

        </div>

    </div>
</section>

@endsection

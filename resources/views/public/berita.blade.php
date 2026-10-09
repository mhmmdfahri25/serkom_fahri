@extends('public.dashboard')

@section('title', 'Berita - ' . ($sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA'))

@section('content')

<style>

    .back-home {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 30px;
        padding: 11px 20px;
        border-radius: 10px;
        background: #fff;
        color: #2563eb;
        border: 1px solid #2563eb;
        text-decoration: none;
        font-weight: 700;
        transition: .3s;
    }

    .back-home:hover {
        background: #2563eb;
        color: #fff;
        transform: translateY(-2px);
    }

    .public-page {
        padding: 80px 0;
        background: #f8fafc;
        min-height: 80vh;
    }

    .page-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .page-header .badge-title {
        display: inline-block;
        padding: 8px 16px;
        margin-bottom: 12px;
        border-radius: 30px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 13px;
        font-weight: 700;
    }

    .page-header h1 {
        color: #172554;
        font-size: 42px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .page-header p {
        max-width: 700px;
        margin: auto;
        color: #64748b;
        line-height: 1.8;
    }

    .news-public-card {
        height: 100%;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(15,23,42,.06);
        transition: .3s;
    }

    .news-public-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 40px rgba(15,23,42,.10);
    }

    .news-public-image {
        width: 100%;
        height: 230px;
        object-fit: cover;
    }

    .news-public-content {
        padding: 24px;
    }

    .news-date {
        color: #2563eb;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 9px;
    }

    .news-public-content h4 {
        color: #172554;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .news-public-content p {
        color: #64748b;
        line-height: 1.7;
        font-size: 14px;
    }

    .detail-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-top: 8px;
        padding: 10px 18px;
        border-radius: 9px;
        background: #2563eb;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
    }

    .detail-btn:hover {
        background: #1d4ed8;
        color: #fff;
    }
</style>

<section class="public-page">
    <div class="container">

        <a href="{{ route('public.dashboard') }}" class="back-home">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Landing Page
        </a>

        <div class="page-header">
            <span class="badge-title">Informasi Sekolah</span>
            <h1>Berita Terbaru</h1>
            <p>
                Informasi dan berita terbaru dari {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}.
            </p>
        </div>

        <div class="row g-4">
            @forelse($berita as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="news-public-card">

                        @if($item->foto)
                            <img src="{{ asset('uploads/berita/'.$item->foto) }}"
                                 class="news-public-image"
                                 alt="{{ $item->judul }}">
                        @else
                            <img src="{{ asset('assets/images/logosman1samarinda.png') }}"
                                 class="news-public-image"
                                 alt="{{ $item->judul }}">
                        @endif

                        <div class="news-public-content">

                            <div class="news-date">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $item->tanggal }}
                            </div>

                            <h4>{{ $item->judul }}</h4>

                            <p>
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 130) }}
                            </p>

                            <a href="{{ route('public.berita.show', $item->id) }}" class="detail-btn">
                                <i class="bi bi-eye"></i>
                                Baca Selengkapnya
                            </a>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-light text-center">
                        Belum ada berita.
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</section>

@endsection

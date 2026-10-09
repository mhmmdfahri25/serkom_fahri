@extends('public.dashboard')

@section('title', 'Galeri - ' . ($sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA'))

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

    .gallery-public-card {
        position: relative;
        overflow: hidden;
        height: 320px;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(15,23,42,.08);
    }

    .gallery-public-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .4s;
    }

    .gallery-public-card:hover img {
        transform: scale(1.06);
    }

    .gallery-public-overlay {
        position: absolute;
        inset: auto 0 0;
        padding: 60px 22px 22px;
        background: linear-gradient(transparent, rgba(0,0,0,.85));
        color: #fff;
    }

    .gallery-public-overlay h4 {
        font-weight: 800;
        margin-bottom: 5px;
    }

    .gallery-public-overlay p {
        margin: 0 0 12px;
        color: rgba(255,255,255,.8);
        font-size: 14px;
    }

    .detail-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 9px 16px;
        border-radius: 8px;
        background: #2563eb;
        color: #fff;
        text-decoration: none;
        font-size: 13px;
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
            <span class="badge-title">Dokumentasi</span>
            <h1>Galeri Sekolah</h1>
            <p>
                Dokumentasi kegiatan dan aktivitas {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}.
            </p>
        </div>

        <div class="row g-4">

            @forelse($galeri as $item)
                <div class="col-md-6 col-lg-4">

                    <div class="gallery-public-card">

                        @if($item->foto)
                            <img src="{{ asset('uploads/galeri/'.$item->foto) }}"
                                 alt="{{ $item->judul }}">
                        @else
                            <img src="{{ asset('assets/images/logosman1samarinda.png') }}"
                                 alt="{{ $item->judul }}">
                        @endif

                        <div class="gallery-public-overlay">

                            <h4>{{ $item->judul }}</h4>

                            @if($item->keterangan)
                                <p>{{ $item->keterangan }}</p>
                            @endif

                            <a href="{{ route('public.galeri.show', $item->id) }}" class="detail-btn">
                                <i class="bi bi-eye"></i>
                                Detail
                            </a>

                        </div>

                    </div>

                </div>
            @empty

                <div class="col-12">
                    <div class="alert alert-light text-center">
                        Belum ada galeri.
                    </div>
                </div>

            @endforelse

        </div>

    </div>
</section>

@endsection

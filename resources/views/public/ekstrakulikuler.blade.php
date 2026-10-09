@extends('public.dashboard')

@section('title', 'Ekstrakurikuler - ' . ($sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA'))

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

    .extra-public-card {
        height: 100%;
        overflow: hidden;
        border-radius: 18px;
        background: #fff;
        border: 1px solid #e5e7eb;
        box-shadow: 0 10px 30px rgba(15,23,42,.06);
        transition: .3s;
    }

    .extra-public-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 40px rgba(15,23,42,.10);
    }

    .extra-public-image {
        width: 100%;
        height: 240px;
        object-fit: cover;
    }

    .extra-public-content {
        padding: 25px;
    }

    .extra-public-content h4 {
        color: #172554;
        font-weight: 800;
        margin-bottom: 15px;
    }

    .extra-info {
        display: flex;
        gap: 8px;
        margin-bottom: 9px;
        color: #64748b;
        font-size: 14px;
    }

    .extra-info i {
        color: #2563eb;
    }

    .extra-public-content p {
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
            <span class="badge-title">Kegiatan Siswa</span>
            <h1>Ekstrakurikuler</h1>
            <p>
                Berbagai kegiatan ekstrakurikuler untuk mengembangkan minat, bakat, dan kreativitas siswa.
            </p>
        </div>

        <div class="row g-4">

            @forelse($ekstrakulikulers as $item)
                <div class="col-md-6 col-lg-4">

                    <div class="extra-public-card">

                        @if($item->foto)
                            <img src="{{ asset('uploads/ekstrakulikuler/'.$item->foto) }}"
                                 class="extra-public-image"
                                 alt="{{ $item->nama_ekstrakulikuler }}">
                        @else
                            <img src="{{ asset('assets/images/logosman1samarinda.png') }}"
                                 class="extra-public-image"
                                 alt="{{ $item->nama_ekstrakulikuler }}">
                        @endif

                        <div class="extra-public-content">

                            <h4>{{ $item->nama_ekstrakulikuler }}</h4>

                            <div class="extra-info">
                                <i class="bi bi-person"></i>
                                <span>Pembina: {{ $item->pembina ?? '-' }}</span>
                            </div>

                            <div class="extra-info">
                                <i class="bi bi-calendar3"></i>
                                <span>Jadwal: {{ $item->jadwal_latihan ?? '-' }}</span>
                            </div>

                            <p>
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 130) }}
                            </p>

                            <a href="{{ route('public.ekstrakulikuler.show', $item->id) }}" class="detail-btn">
                                <i class="bi bi-eye"></i>
                                Detail
                            </a>

                        </div>

                    </div>

                </div>
            @empty

                <div class="col-12">
                    <div class="alert alert-light text-center">
                        Belum ada data ekstrakurikuler.
                    </div>
                </div>

            @endforelse

        </div>

    </div>
</section>

@endsection

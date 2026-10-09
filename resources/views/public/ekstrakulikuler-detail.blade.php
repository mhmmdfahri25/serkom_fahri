@extends('public.dashboard')

@section('title', $ekstrakulikuler->nama_ekstrakulikuler . ' - ' . ($sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA'))

@section('content')

<style>
    .detail-page {
        padding: 80px 0;
        background: #f8fafc;
        min-height: 80vh;
    }

    .extra-detail {
        max-width: 950px;
        margin: auto;
        overflow: hidden;
        border-radius: 22px;
        background: #fff;
        border: 1px solid #e5e7eb;
        box-shadow: 0 15px 40px rgba(15,23,42,.08);
    }

    .extra-detail-image {
        width: 100%;
        height: 450px;
        object-fit: cover;
    }

    .extra-detail-content {
        padding: 35px;
    }

    .extra-detail-content h1 {
        color: #172554;
        font-weight: 800;
        margin-bottom: 25px;
    }

    .extra-info-box {
        padding: 16px;
        margin-bottom: 12px;
        border-radius: 12px;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
    }

    .extra-info-box small {
        display: block;
        color: #64748b;
        margin-bottom: 4px;
    }

    .extra-info-box strong {
        color: #172554;
    }

    .extra-description {
        margin-top: 25px;
        color: #475569;
        line-height: 1.9;
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

        <div class="extra-detail">

            @if($ekstrakulikuler->foto)
                <img src="{{ asset('uploads/ekstrakulikuler/'.$ekstrakulikuler->foto) }}"
                     class="extra-detail-image"
                     alt="{{ $ekstrakulikuler->nama_ekstrakulikuler }}">
            @else
                <img src="{{ asset('assets/images/logosman1samarinda.png') }}"
                     class="extra-detail-image"
                     alt="{{ $ekstrakulikuler->nama_ekstrakulikuler }}">
            @endif

            <div class="extra-detail-content">

                <h1>{{ $ekstrakulikuler->nama_ekstrakulikuler }}</h1>

                <div class="extra-info-box">
                    <small>Pembina</small>
                    <strong>{{ $ekstrakulikuler->pembina ?? '-' }}</strong>
                </div>

                <div class="extra-info-box">
                    <small>Jadwal Latihan</small>
                    <strong>{{ $ekstrakulikuler->jadwal_latihan ?? '-' }}</strong>
                </div>

                <div class="extra-description">
                    {!! nl2br(e($ekstrakulikuler->deskripsi ?? 'Deskripsi belum tersedia.')) !!}
                </div>

                <a href="{{ route('public.ekstrakulikuler') }}" class="back-btn">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Ekstrakurikuler
                </a>

            </div>

        </div>

    </div>
</section>

@endsection

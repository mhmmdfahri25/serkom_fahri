@extends('public.dashboard')

@section('title', $guru->nama_guru . ' - ' . ($sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA'))

@section('content')

<style>
    .detail-page {
        padding: 80px 0;
        background: #f8fafc;
        min-height: 80vh;
    }

    .detail-card {
        max-width: 950px;
        margin: auto;
        overflow: hidden;
        border-radius: 22px;
        background: #fff;
        border: 1px solid #e5e7eb;
        box-shadow: 0 15px 40px rgba(15, 23, 42, .08);
    }

    .detail-image-wrapper {
        width: 100%;
        overflow: hidden;
        background: #f1f5f9;
    }

    .detail-image {
        width: 100%;
        height: auto;
        display: block;
    }

    .detail-content {
        padding: 35px;
    }

    .detail-content h1 {
        color: #172554;
        font-weight: 800;
        margin-bottom: 25px;
    }

    .detail-info {
        padding: 16px;
        margin-bottom: 12px;
        border-radius: 12px;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
    }

    .detail-info small {
        display: block;
        color: #64748b;
        margin-bottom: 4px;
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
        transition: .3s;
    }

    .back-btn:hover {
        background: #1d4ed8;
        color: #fff;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .detail-page {
            padding: 50px 0;
        }

        .detail-content {
            padding: 25px;
        }

        .detail-content h1 {
            font-size: 28px;
        }
    }
</style>

<section class="detail-page">

    <div class="container">

        <div class="detail-card">

            <div class="detail-image-wrapper">

                @if($guru->foto && file_exists(public_path('uploads/guru/' . $guru->foto)))

                    <img
                        src="{{ asset('uploads/guru/' . $guru->foto) }}"
                        class="detail-image"
                        alt="{{ $guru->nama_guru }}">

                @else

                    <img
                        src="{{ asset('assets/images/logosman1samarinda.png') }}"
                        class="detail-image"
                        alt="{{ $guru->nama_guru }}">

                @endif

            </div>

            <div class="detail-content">

                <h1>
                    {{ $guru->nama_guru }}
                </h1>

                <div class="detail-info">

                    <small>
                        NIP
                    </small>

                    <strong>
                        {{ $guru->nip }}
                    </strong>

                </div>

                <div class="detail-info">

                    <small>
                        Mata Pelajaran
                    </small>

                    <strong>
                        {{ $guru->mata_pelajaran }}
                    </strong>

                </div>

                <a
                    href="{{ route('public.guru') }}"
                    class="back-btn">

                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Guru

                </a>

            </div>

        </div>

    </div>

</section>

@endsection

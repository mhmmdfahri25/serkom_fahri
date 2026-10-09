@extends('public.dashboard')

@section('title', 'Guru - ' . ($sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA'))

@section('content')

<style>
    .public-page {
        padding: 80px 0;
        background: #f8fafc;
        min-height: 80vh;
    }

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

    .guru-public-card {
        height: 100%;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .06);
        transition: .3s;
    }

    .guru-public-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 40px rgba(15, 23, 42, .10);
    }

    .guru-public-photo {
        width: 100%;
        height: auto;
        display: block;
    }

    .guru-public-content {
        padding: 25px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .guru-public-content h4 {
        color: #172554;
        font-weight: 800;
        margin-bottom: 15px;
        min-height: 58px;
        display: flex;
        align-items: flex-start;
    }

    .guru-info {
        display: flex;
        gap: 9px;
        margin-bottom: 9px;
        color: #64748b;
        font-size: 14px;
    }

    .guru-info i {
        color: #2563eb;
        flex-shrink: 0;
    }

    .detail-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        align-self: flex-start;
        margin-top: auto;
        padding: 10px 18px;
        border-radius: 9px;
        background: #2563eb;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
        transition: .3s;
    }

    .detail-btn:hover {
        background: #1d4ed8;
        color: #fff;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .public-page {
            padding: 50px 0;
        }

        .page-header h1 {
            font-size: 32px;
        }

        .guru-public-content {
            padding: 20px;
        }
    }
</style>

<section class="public-page">

    <div class="container">

        <a href="{{ route('public.dashboard') }}" class="back-home">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Landing Page
        </a>

        <div class="page-header">

            <span class="badge-title">
                Tenaga Pendidik
            </span>

            <h1>
                Guru {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMRINDA' }}
            </h1>

            <p>
                Kenali tenaga pendidik yang berperan dalam memberikan pendidikan terbaik kepada seluruh peserta didik.
            </p>

        </div>

        <div class="row g-4">

            @forelse($guru as $item)

                <div class="col-md-6 col-lg-4 d-flex">

                    <div class="guru-public-card w-100">

                        @if($item->foto && file_exists(public_path('uploads/guru/' . $item->foto)))

                            <img
                                src="{{ asset('uploads/guru/' . $item->foto) }}"
                                class="guru-public-photo"
                                alt="{{ $item->nama_guru }}">

                        @else

                            <img
                                src="{{ asset('assets/images/logosman1samarinda.png') }}"
                                class="guru-public-photo"
                                alt="{{ $item->nama_guru }}">

                        @endif

                        <div class="guru-public-content">

                            <h4>
                                {{ $item->nama_guru }}
                            </h4>

                            <div class="guru-info">

                                <i class="bi bi-person-badge"></i>

                                <span>
                                    NIP: {{ $item->nip }}
                                </span>

                            </div>

                            <div class="guru-info">

                                <i class="bi bi-book"></i>

                                <span>
                                    {{ $item->mata_pelajaran }}
                                </span>

                            </div>

                            <a
                                href="{{ route('public.guru.show', $item->id) }}"
                                class="detail-btn">

                                <i class="bi bi-eye"></i>
                                Detail

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-light text-center">
                        Data guru belum tersedia.
                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection

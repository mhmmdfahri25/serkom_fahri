@extends('public.dashboard')

@section('title', $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA')

@section('content')

<style>
    /* ================= GENERAL ================= */
    html {
        scroll-behavior: smooth;
    }

    section {
        scroll-margin-top: 90px;
    }

    .section-padding {
        padding: 90px 0;
    }

    .section-title {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-title .badge-title {
        display: inline-block;
        padding: 7px 15px;
        margin-bottom: 12px;
        border-radius: 30px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 13px;
        font-weight: 700;
    }

    .section-title h2 {
        margin-bottom: 12px;
        color: #172554;
        font-size: 38px;
        font-weight: 800;
    }

    .section-title p {
        max-width: 700px;
        margin: auto;
        color: #64748b;
        line-height: 1.8;
    }

    /* ================= HERO ================= */
    .hero-carousel {
        width: 100%;
        overflow: hidden;
    }

    .hero-slide {
        position: relative;
        height: 710px;
        overflow: hidden;
    }

    .hero-background {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            90deg,
            rgba(5, 23, 61, .94) 0%,
            rgba(8, 31, 76, .84) 45%,
            rgba(18, 38, 91, .58) 100%
        );
    }

    .hero-content {
        position: relative;
        z-index: 2;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        max-width: 1100px;
        padding-top: 30px;
        padding-bottom: 70px;
    }

    .hero-badge {
        width: fit-content;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 9px 16px;
        margin-bottom: 24px;
        border: 1px solid rgba(255,255,255,.25);
        border-radius: 30px;
        background: rgba(255,255,255,.10);
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        backdrop-filter: blur(8px);
    }

    .hero-content h1 {
        max-width: 850px;
        margin: 0 0 20px;
        color: #fff;
        font-size: clamp(42px, 5vw, 68px);
        line-height: 1.08;
        font-weight: 800;
        letter-spacing: -2px;
    }

    .hero-content h1 span {
        display: block;
        color: #8ebcff;
    }

    .hero-content p {
        max-width: 760px;
        margin: 0 0 30px;
        color: rgba(255,255,255,.88);
        font-size: 17px;
        line-height: 1.9;
    }

    .hero-buttons {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .hero-buttons .btn {
        padding: 12px 22px;
        border-radius: 10px;
        font-weight: 700;
    }

    .hero-buttons .btn i {
        margin-right: 7px;
    }

    .hero-carousel .carousel-control-prev,
    .hero-carousel .carousel-control-next {
        z-index: 5;
        width: 7%;
    }

    .hero-carousel .carousel-control-prev-icon,
    .hero-carousel .carousel-control-next-icon {
        width: 42px;
        height: 42px;
        padding: 10px;
        border-radius: 50%;
        background-color: rgba(255,255,255,.18);
        background-size: 55%;
        backdrop-filter: blur(5px);
    }

    .hero-carousel .carousel-indicators {
        z-index: 6;
        margin-bottom: 25px;
    }

    .hero-carousel .carousel-indicators button {
        width: 28px;
        height: 4px;
        margin: 0 5px;
        border: 0;
        border-radius: 10px;
        background-color: rgba(255,255,255,.5);
    }

    .hero-carousel .carousel-indicators button.active {
        width: 45px;
        background-color: #fff;
    }

    /* ================= STATISTIK ================= */
    .stats-section {
        position: relative;
        z-index: 5;
        margin-top: -55px;
    }

    .stats-card {
        padding: 30px 20px;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        background: #fff;
        text-align: center;
        box-shadow: 0 15px 40px rgba(15,23,42,.08);
        transition: .3s;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 45px rgba(15,23,42,.12);
    }

    .stats-icon {
        width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        border-radius: 14px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 25px;
    }

    .stats-card h3 {
        margin: 0;
        color: #172554;
        font-size: 30px;
        font-weight: 800;
    }

    .stats-card p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 14px;
    }

    /* ================= PROFIL ================= */
    .profile-section {
        background: #f8fafc;
    }

    .profile-image {
        width: 100%;
        height: 430px;
        object-fit: cover;
        border-radius: 22px;
        box-shadow: 0 20px 50px rgba(15,23,42,.12);
    }

    .profile-content h2 {
        margin-bottom: 20px;
        color: #172554;
        font-size: 38px;
        font-weight: 800;
    }

    .profile-content p {
        color: #64748b;
        line-height: 1.9;
        margin-bottom: 15px;
    }

    .profile-info {
        display: grid;
        grid-template-columns: repeat(2,1fr);
        gap: 15px;
        margin-top: 25px;
    }

    .profile-info-item {
        padding: 17px;
        border-radius: 12px;
        background: #fff;
        border: 1px solid #e5e7eb;
    }

    .profile-info-item small {
        display: block;
        margin-bottom: 5px;
        color: #64748b;
    }

    .profile-info-item strong {
        color: #172554;
    }

    /* ================= VISI MISI ================= */
    .vision-card,
    .mission-card {
        height: 100%;
        padding: 35px;
        border-radius: 20px;
        background: #fff;
        border: 1px solid #e5e7eb;
        box-shadow: 0 10px 30px rgba(15,23,42,.05);
    }

    .vision-icon,
    .mission-icon {
        width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        border-radius: 14px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 25px;
    }

    .vision-card h3,
    .mission-card h3 {
        margin-bottom: 15px;
        color: #172554;
        font-weight: 800;
    }

    .vision-card p,
    .mission-card li {
        color: #64748b;
        line-height: 1.8;
    }

    .mission-card ul {
        padding-left: 20px;
        margin: 0;
    }

    /* ================= GURU ================= */
    .guru-card {
        height: 100%;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(15,23,42,.05);
        transition: .3s;
    }

    .guru-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(15,23,42,.10);
    }

    .guru-photo {
        width: 100%;
        height: 270px;
        object-fit: cover;
    }

    .guru-content {
        padding: 22px;
    }

    .guru-content h5 {
        margin-bottom: 7px;
        color: #172554;
        font-weight: 800;
    }

    .guru-content p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    /* ================= SISWA ================= */
    .student-section {
        background: #f8fafc;
    }

    .student-card {
        padding: 30px;
        border-radius: 18px;
        background: #fff;
        border: 1px solid #e5e7eb;
        box-shadow: 0 10px 30px rgba(15,23,42,.05);
    }

    .student-card h4 {
        color: #172554;
        font-weight: 800;
    }

    .student-card p {
        color: #64748b;
        line-height: 1.8;
    }

    /* ================= BERITA ================= */
    .news-card {
        height: 100%;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(15,23,42,.05);
        transition: .3s;
    }

    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 40px rgba(15,23,42,.10);
    }

    .news-image {
        width: 100%;
        height: 210px;
        object-fit: cover;
    }

    .news-content {
        padding: 22px;
    }

    .news-date {
        color: #2563eb;
        font-size: 13px;
        font-weight: 700;
    }

    .news-content h5 {
        margin: 8px 0 10px;
        color: #172554;
        font-weight: 800;
    }

    .news-content p {
        color: #64748b;
        line-height: 1.7;
        font-size: 14px;
    }

    /* ================= GALERI ================= */
    .gallery-section {
        background: #f8fafc;
    }

    .gallery-card {
        position: relative;
        overflow: hidden;
        height: 280px;
        border-radius: 18px;
    }

    .gallery-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .4s;
    }

    .gallery-card:hover img {
        transform: scale(1.07);
    }

    .gallery-overlay {
        position: absolute;
        inset: auto 0 0;
        padding: 30px 20px 20px;
        background: linear-gradient(transparent,rgba(0,0,0,.8));
        color: #fff;
    }

    .gallery-overlay h5 {
        margin: 0;
        font-weight: 700;
    }

    /* ================= EKSTRAKURIKULER ================= */
    .extra-card {
        height: 100%;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(15,23,42,.05);
        transition: .3s;
    }

    .extra-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 40px rgba(15,23,42,.10);
    }

    .extra-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .extra-content {
        padding: 22px;
    }

    .extra-content h5 {
        color: #172554;
        font-weight: 800;
    }

    .extra-content p {
        color: #64748b;
        line-height: 1.7;
        font-size: 14px;
    }

    /* ================= BUTTON ================= */
    .view-all {
        margin-top: 40px;
        text-align: center;
    }

    .view-all-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 22px;
        border-radius: 10px;
        border: 1px solid #2563eb;
        background: #2563eb;
        color: #fff;
        text-decoration: none;
        font-weight: 700;
        transition: .3s;
    }

    .view-all-btn:hover {
        background: #1d4ed8;
        color: #fff;
        transform: translateY(-2px);
    }

    /* ================= CTA ================= */
    .cta-section {
        padding: 80px 0;
        background: linear-gradient(135deg,#172554,#2563eb);
        color: #fff;
    }

    .cta-section h2 {
        margin-bottom: 15px;
        font-size: 38px;
        font-weight: 800;
    }

    .cta-section p {
        max-width: 700px;
        margin: auto;
        color: rgba(255,255,255,.8);
        line-height: 1.8;
    }

    /* ================= FOOTER ================= */
    .site-footer {
        width: 100%;
        display: block;
        position: relative;
        z-index: 20;
        padding: 55px 0 20px;
        margin: 0;
        background: #0f172a;
        color: #fff;
    }

    .footer-brand {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 18px;
    }

    .footer-logo {
        width: 65px;
        height: 65px;
        object-fit: contain;
    }

    .footer-brand h5 {
        margin: 0;
        color: #fff;
        font-size: 18px;
        font-weight: 800;
    }

    .footer-brand p {
        margin: 3px 0 0;
        color: #94a3b8;
        font-size: 13px;
    }

    .site-footer h6 {
        margin-bottom: 18px;
        color: #fff;
        font-size: 15px;
        font-weight: 700;
    }

    .site-footer p {
        color: #94a3b8;
        font-size: 14px;
        line-height: 1.8;
    }

    .footer-links {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .footer-links li {
        margin-bottom: 9px;
    }

    .footer-links a {
        color: #94a3b8;
        text-decoration: none;
        font-size: 14px;
        transition: .25s;
    }

    .footer-links a:hover {
        color: #fff;
        padding-left: 4px;
    }

    .footer-contact {
        display: flex;
        gap: 10px;
        margin-bottom: 12px;
        color: #94a3b8;
        font-size: 14px;
    }

    .footer-contact i {
        color: #60a5fa;
        margin-top: 3px;
    }

    .footer-social {
        display: flex;
        gap: 9px;
        margin-top: 18px;
    }

    .footer-social a {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: rgba(255,255,255,.08);
        color: #fff;
        text-decoration: none;
        transition: .25s;
    }

    .footer-social a:hover {
        background: #2563eb;
        transform: translateY(-3px);
    }

    .footer-bottom {
        margin-top: 35px;
        padding-top: 20px;
        border-top: 1px solid rgba(255,255,255,.1);
        text-align: center;
    }

    .footer-bottom p {
        margin: 0;
        font-size: 13px;
        color: #64748b;
    }

    /* ================= SCROLL ANIMATION ================= */
    .scroll-animate {
        opacity: 0;
        transform: translateY(60px);
        transition:
            opacity .8s ease,
            transform .8s cubic-bezier(.22,1,.36,1);
    }

    .scroll-animate.from-left {
        transform: translateX(-80px);
    }

    .scroll-animate.from-right {
        transform: translateX(80px);
    }

    .scroll-animate.zoom {
        transform: scale(.85);
    }

    .scroll-animate.show {
        opacity: 1;
        transform: translateY(0) translateX(0) scale(1);
    }

    .scroll-delay-1 {
        transition-delay: .1s;
    }

    .scroll-delay-2 {
        transition-delay: .2s;
    }

    .scroll-delay-3 {
        transition-delay: .3s;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .hero-slide {
            height: 620px;
        }

        .hero-content {
            padding: 30px;
            justify-content: center;
        }

        .hero-content h1 {
            font-size: 40px;
            letter-spacing: -1px;
        }

        .hero-content p {
            font-size: 15px;
            line-height: 1.7;
        }

        .hero-buttons {
            flex-wrap: wrap;
        }

        .hero-buttons .btn {
            width: 100%;
        }

        .profile-image {
            height: 300px;
            margin-bottom: 30px;
        }

        .profile-info {
            grid-template-columns: 1fr;
        }

        .section-title h2 {
            font-size: 30px;
        }

        .scroll-animate.from-left,
        .scroll-animate.from-right {
            transform: translateY(60px);
        }

        .scroll-animate.show {
            transform: translateY(0) translateX(0) scale(1);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        html {
            scroll-behavior: auto;
        }

        .scroll-animate {
            opacity: 1;
            transform: none;
            transition: none;
        }
    }
</style>

{{-- ================= HERO ================= --}}
<section id="beranda" class="hero-carousel">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            {{-- SLIDE 1 --}}
            <div class="carousel-item active">
                <div class="hero-slide">
                    @if($sekolah && $sekolah->foto)
                        <img src="{{ asset('uploads/sekolah/'.$sekolah->foto) }}" class="hero-background" alt="{{ $sekolah->nama_sekolah }}">
                    @else
                        <img src="{{ asset('assets/images/logosman1samarinda.png') }}" class="hero-background" alt="{{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}">
                    @endif
                    <div class="hero-overlay"></div>
                    <div class="container hero-content">
                        <div class="hero-badge scroll-animate"><i class="bi bi-mortarboard-fill"></i>Situs Resmi Sekolah</div>
                        <h1 class="scroll-animate">Selamat Datang di<span>{{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}</span></h1>
                        <p class="scroll-animate">{{ $sekolah->deskripsi ?? 'Pendidikan berkualitas untuk membentuk generasi yang berkarakter, berprestasi, kreatif, dan siap menghadapi masa depan.' }}</p>
                        <div class="hero-buttons scroll-animate">
                            <a href="#profil" class="btn btn-light"><i class="bi bi-building"></i>Kenali Sekolah</a>
                            <a href="#berita" class="btn btn-outline-light"><i class="bi bi-newspaper"></i>Lihat Berita</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SLIDE 2 --}}
            <div class="carousel-item">
                <div class="hero-slide">
                    @if(isset($galeris) && $galeris->count() > 0 && $galeris->first()->foto)
                        <img src="{{ asset('uploads/galeri/'.$galeris->first()->foto) }}" class="hero-background" alt="Kegiatan {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}">
                    @else
                        <img src="{{ asset('assets/images/logosman1samarinda.png') }}" class="hero-background" alt="Kegiatan {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}">
                    @endif
                    <div class="hero-overlay"></div>
                    <div class="container hero-content">
                        <div class="hero-badge scroll-animate"><i class="bi bi-images"></i>Kegiatan Sekolah</div>
                        <h1 class="scroll-animate">Aktif dan<span>Berprestasi</span></h1>
                        <p class="scroll-animate">Berbagai kegiatan akademik dan non-akademik menjadi bagian dari perjalanan siswa {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }} untuk berkembang dan meraih prestasi.</p>
                        <div class="hero-buttons scroll-animate">
                            <a href="#galeri" class="btn btn-light"><i class="bi bi-images"></i>Lihat Galeri</a>
                            <a href="#ekstrakurikuler" class="btn btn-outline-light"><i class="bi bi-trophy"></i>Ekstrakurikuler</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SLIDE 3 --}}
            <div class="carousel-item">
                <div class="hero-slide">
                    @if(isset($beritaTerbaru) && $beritaTerbaru->count() > 0 && $beritaTerbaru->first()->foto)
                        <img src="{{ asset('uploads/berita/'.$beritaTerbaru->first()->foto) }}" class="hero-background" alt="Berita {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}">
                    @else
                        <img src="{{ asset('assets/images/logosman1samarinda.png') }}" class="hero-background" alt="Berita {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}">
                    @endif
                    <div class="hero-overlay"></div>
                    <div class="container hero-content">
                        <div class="hero-badge scroll-animate"><i class="bi bi-megaphone-fill"></i>Informasi Sekolah</div>
                        <h1 class="scroll-animate">Informasi<span>Terbaru Sekolah</span></h1>
                        <p class="scroll-animate">Dapatkan informasi terbaru mengenai kegiatan, pengumuman, berita, dan berbagai perkembangan {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}.</p>
                        <div class="hero-buttons scroll-animate">
                            <a href="#berita" class="btn btn-light"><i class="bi bi-newspaper"></i>Baca Berita</a>
                            <a href="#guru" class="btn btn-outline-light"><i class="bi bi-people"></i>Kenali Guru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Berikutnya</span>
        </button>
    </div>
</section>

{{-- ================= STATISTIK ================= --}}
<section class="stats-section">
    <div class="container">
        <div class="row g-3">
            <div class="col-6 col-lg-3">
                <div class="stats-card scroll-animate zoom">
                    <div class="stats-icon"><i class="bi bi-people-fill"></i></div>
                    <h3>{{ $jumlahSiswa ?? 0 }}</h3>
                    <p>Siswa</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stats-card scroll-animate zoom scroll-delay-1">
                    <div class="stats-icon"><i class="bi bi-person-badge-fill"></i></div>
                    <h3>{{ $jumlahGuru ?? 0 }}</h3>
                    <p>Guru</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stats-card scroll-animate zoom scroll-delay-2">
                    <div class="stats-icon"><i class="bi bi-newspaper"></i></div>
                    <h3>{{ $jumlahBerita ?? 0 }}</h3>
                    <p>Berita</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stats-card scroll-animate zoom scroll-delay-3">
                    <div class="stats-icon"><i class="bi bi-trophy-fill"></i></div>
                    <h3>{{ $jumlahEkstrakulikuler ?? 0 }}</h3>
                    <p>Ekstrakurikuler</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= PROFIL ================= --}}
<section id="profil" class="section-padding profile-section">
    <div class="container">
       <div class="section-title scroll-animate">
            <span class="badge-title" style="font-size: 22px; padding: 12px 25px;">
                Tentang Sekolah
            </span>
        </div>
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                @if($sekolah && $sekolah->foto)
                    <img src="{{ asset('uploads/sekolah/'.$sekolah->foto) }}" class="profile-image scroll-animate from-left" alt="{{ $sekolah->nama_sekolah }}">
                @else
                    <img src="{{ asset('assets/images/logosman1samarinda.png') }}" class="profile-image scroll-animate from-left" alt="{{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}">
                @endif
            </div>
            <div class="col-lg-7">
                <div class="profile-content scroll-animate from-right">
                    <h2>{{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}</h2>
                    <p>{{ $sekolah->deskripsi ?? 'SMAN 1 SAMARINDA merupakan sekolah yang berkomitmen memberikan pendidikan berkualitas bagi seluruh peserta didik.' }}</p>
                    <div class="profile-info">
                        <div class="profile-info-item">
                            <small><i class="bi bi-person-badge me-1"></i>Kepala Sekolah</small>
                            <strong>{{ $sekolah->kepala_sekolah ?? '-' }}</strong>
                        </div>
                        <div class="profile-info-item">
                            <small><i class="bi bi-calendar3 me-1"></i>Tahun Berdiri</small>
                            <strong>{{ $sekolah->tahun_berdiri ?? '-' }}</strong>
                        </div>
                        <div class="profile-info-item">
                            <small><i class="bi bi-geo-alt me-1"></i>Alamat</small>
                            <strong>{{ $sekolah->alamat ?? '-' }}</strong>
                        </div>
                        <div class="profile-info-item">
                            <small><i class="bi bi-telephone me-1"></i>Kontak</small>
                            <strong>{{ $sekolah->kontak ?? '-' }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= VISI MISI ================= --}}
<section class="section-padding">
    <div class="container">
        <div class="section-title scroll-animate">
            <span class="badge-title">Visi & Misi</span>
            <h2>Visi dan Misi Sekolah</h2>
        </div>

       <div class="vision-card scroll-animate from-left text-center">
            <h3>Visi dan Misi</h3>
            <p>
                {{ $sekolah->{'visi-misi'} ?? 'Visi dan misi sekolah belum tersedia.' }}
            </p>
        </div>
    </div>
</section>

{{-- ================= GURU ================= --}}
<section id="guru" class="section-padding">
    <div class="container">
        <div class="section-title scroll-animate">
            <span class="badge-title">Tenaga Pendidik</span>
            <h2>Guru Kami</h2>
            <p>Tenaga pendidik yang berperan dalam memberikan pendidikan terbaik kepada peserta didik.</p>
        </div>
        <div class="row g-4">
            @forelse($guru->take(3) as $index => $item)
                <div class="col-md-6 col-lg-4">
                    <div class="guru-card scroll-animate zoom" style="transition-delay: {{ ($index + 1) * .15 }}s;">
                        @if($item->foto)
                            <img src="{{ asset('uploads/guru/'.$item->foto) }}" class="guru-photo" alt="{{ $item->nama_guru }}">
                        @else
                            <img src="{{ asset('assets/images/logosman1samarinda.png') }}" class="guru-photo" alt="{{ $item->nama_guru }}">
                        @endif
                        <div class="guru-content">
                            <h5>{{ $item->nama_guru }}</h5>
                            <p><i class="bi bi-person-badge me-1"></i>NIP: {{ $item->nip }}</p>
                            <p class="mt-2"><i class="bi bi-book me-1"></i>{{ $item->mata_pelajaran }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-light text-center">Data guru belum tersedia.</div>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ================= SISWA ================= --}}
<section id="siswa" class="section-padding student-section">
    <div class="container">
        <div class="section-title scroll-animate">
            <span class="badge-title">Peserta Didik</span>
            <h2>Data Siswa</h2>
            <p>Informasi jumlah dan data peserta didik {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="student-card text-center scroll-animate zoom">
                    <div class="stats-icon"><i class="bi bi-people-fill"></i></div>
                    <h4>{{ $jumlahSiswa ?? 0 }}</h4>
                    <p>Total peserta didik yang terdaftar di {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= BERITA ================= --}}
<section id="berita" class="section-padding">
    <div class="container">
        <div class="section-title scroll-animate">
            <span class="badge-title">Informasi</span>
            <h2>Berita Terbaru</h2>
            <p>Informasi dan berita terbaru dari {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}.</p>
        </div>
        <div class="row g-4">
            @forelse($beritaTerbaru->take(3) as $index => $item)
                <div class="col-md-6 col-lg-4">
                    <div class="news-card scroll-animate from-left" style="transition-delay: {{ ($index + 1) * .15 }}s;">
                        @if($item->foto)
                            <img src="{{ asset('uploads/berita/'.$item->foto) }}" class="news-image" alt="{{ $item->judul }}">
                        @else
                            <img src="{{ asset('assets/images/logosman1samarinda.png') }}" class="news-image" alt="{{ $item->judul }}">
                        @endif
                        <div class="news-content">
                            <div class="news-date"><i class="bi bi-calendar3 me-1"></i>{{ $item->tanggal }}</div>
                            <h5>{{ $item->judul }}</h5>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->isi),120) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-light text-center">Belum ada berita.</div>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ================= GALERI ================= --}}
<section id="galeri" class="section-padding gallery-section">
    <div class="container">
        <div class="section-title scroll-animate">
            <span class="badge-title">Dokumentasi</span>
            <h2>Galeri Sekolah</h2>
            <p>Dokumentasi kegiatan dan aktivitas {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}.</p>
        </div>
        <div class="row g-4">
            @forelse($galeris->take(3) as $index => $item)
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-card scroll-animate zoom" style="transition-delay: {{ ($index + 1) * .15 }}s;">
                        @if($item->foto)
                            <img src="{{ asset('uploads/galeri/'.$item->foto) }}" alt="{{ $item->judul }}">
                        @else
                            <img src="{{ asset('assets/images/logosman1samarinda.png') }}" alt="{{ $item->judul }}">
                        @endif
                        <div class="gallery-overlay">
                            <h5>{{ $item->judul }}</h5>
                            @if($item->keterangan)
                                <small>{{ $item->keterangan }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-light text-center">Belum ada galeri.</div>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ================= EKSTRAKURIKULER ================= --}}
<section id="ekstrakurikuler" class="section-padding">
    <div class="container">
        <div class="section-title scroll-animate">
            <span class="badge-title">Kegiatan Siswa</span>
            <h2>Ekstrakurikuler</h2>
            <p>Berbagai kegiatan ekstrakurikuler untuk mengembangkan minat, bakat, dan kreativitas siswa.</p>
        </div>
        <div class="row g-4">
            @forelse($ekstrakulikulers->take(3) as $index => $item)
                <div class="col-md-6 col-lg-4">
                    <div class="extra-card scroll-animate from-right" style="transition-delay: {{ ($index + 1) * .15 }}s;">
                        @if($item->foto)
                            <img src="{{ asset('uploads/ekstrakulikuler/'.$item->foto) }}" class="extra-image" alt="{{ $item->nama_ekstrakulikuler }}">
                        @else
                            <img src="{{ asset('assets/images/logosman1samarinda.png') }}" class="extra-image" alt="{{ $item->nama_ekstrakulikuler }}">
                        @endif
                        <div class="extra-content">
                            <h5>{{ $item->nama_ekstrakulikuler }}</h5>
                            <p class="mb-2"><i class="bi bi-person me-1"></i>Pembina: {{ $item->pembina ?? '-' }}</p>
                            <p class="mb-2"><i class="bi bi-calendar3 me-1"></i>Jadwal: {{ $item->jadwal_latihan ?? '-' }}</p>
                            <p class="mb-0">{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi),120) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-light text-center">Belum ada data ekstrakurikuler.</div>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ================= FOOTER ================= --}}
<footer class="site-footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="footer-brand scroll-animate from-left">
                    @if($sekolah && $sekolah->logo)
                        <img src="{{ asset('uploads/sekolah/'.$sekolah->logo) }}" class="footer-logo" alt="{{ $sekolah->nama_sekolah }}">
                    @else
                        <img src="{{ asset('assets/images/logosman1samarinda.png') }}" class="footer-logo" alt="{{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}">
                    @endif
                    <div>
                        <h5>{{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}</h5>
                        <p>Situs Resmi Sekolah</p>
                    </div>
                </div>
                <p class="scroll-animate from-left">{{ $sekolah->deskripsi ?? 'SMAN 1 SAMARINDA merupakan sekolah yang berkomitmen memberikan pendidikan berkualitas bagi seluruh peserta didik.' }}</p>
                <div class="footer-social scroll-animate">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <h6 class="scroll-animate">Menu</h6>
                <ul class="footer-links scroll-animate">
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#profil">Profil</a></li>
                    <li><a href="#guru">Guru</a></li>
                    <li><a href="#siswa">Siswa</a></li>
                    <li><a href="#berita">Berita</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#ekstrakurikuler">Ekstrakurikuler</a></li>
                </ul>
            </div>

            <div class="col-6 col-lg-4">
                <h6 class="scroll-animate">Informasi Sekolah</h6>
                <div class="footer-contact scroll-animate">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>{{ $sekolah->alamat ?? '-' }}</span>
                </div>
                <div class="footer-contact scroll-animate">
                    <i class="bi bi-telephone-fill"></i>
                    <span>{{ $sekolah->kontak ?? '-' }}</span>
                </div>
                <div class="footer-contact scroll-animate">
                    <i class="bi bi-building"></i>
                    <span>{{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}</span>
                </div>
            </div>
        </div>

        <div class="footer-bottom scroll-animate">
            <p>© {{ date('Y') }} {{ $sekolah->nama_sekolah ?? 'SMAN 1 SAMARINDA' }}. Semua Hak Dilindungi.</p>
        </div>
    </div>
</footer>

{{-- ================= ANIMASI SCROLL ================= --}}
<script>
document.addEventListener('DOMContentLoaded',function(){
    const elements=document.querySelectorAll('.scroll-animate');
    if(!elements.length)return;
    const observer=new IntersectionObserver(function(entries){
        entries.forEach(function(entry){
            if(entry.isIntersecting)entry.target.classList.add('show');
            else entry.target.classList.remove('show');
        });
    },{
        threshold:.15,
        rootMargin:'0px 0px -50px 0px'
    });
    elements.forEach(function(element){observer.observe(element)});
});
</script>

@endsection

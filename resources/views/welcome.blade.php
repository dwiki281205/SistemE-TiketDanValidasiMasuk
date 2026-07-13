@extends('layouts.main')

@section('content')

<!-- Hero Section -->
<style>
    .hero-section {
        background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
        color: #ffffff;
        padding: 90px 0;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        top: -150px;
        right: -100px;
    }

    .hero-title {
        font-size: 42px;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 20px;
    }

    @keyframes float-ticket {
        0% { transform: translateY(0px) rotate(-10deg); filter: drop-shadow(0 15px 25px rgba(0,0,0,0.2)); }
        50% { transform: translateY(-25px) rotate(-5deg); filter: drop-shadow(0 25px 35px rgba(0,0,0,0.3)); }
        100% { transform: translateY(0px) rotate(-10deg); filter: drop-shadow(0 15px 25px rgba(0,0,0,0.2)); }
    }

    .hero-ticket-icon {
        font-size: 240px;
        color: #ffffff;
        animation: float-ticket 6s ease-in-out infinite;
        display: inline-block;
        position: relative;
        z-index: 2;
    }

    .hero-subtitle {
        font-size: 18px;
        opacity: 0.9;
        margin-bottom: 35px;
        font-weight: 400;
    }

    /* Search Box Mockup */
    .search-container {
        background-color: var(--card-bg);
        border-radius: 18px;
        padding: 24px;
        box-shadow: var(--card-shadow);
        color: var(--text-dark);
        margin-top: -40px;
        position: relative;
        z-index: 10;
        border: 1px solid var(--border-color);
    }

    .search-label {
        font-size: 11px;
        text-transform: uppercase;
        font-weight: 700;
        color: var(--text-muted);
        letter-spacing: 0.5px;
        margin-bottom: 6px;
    }

    .search-input-group {
        border-right: 1px solid var(--border-color);
    }

    .search-input-group:last-child {
        border-right: none;
    }

    /* Features Section */
    .features-section {
        padding: 100px 0 60px;
    }

    .feature-card {
        background-color: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 40px 30px;
        box-shadow: var(--card-shadow);
        transition: var(--transition-fluid);
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .feature-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: var(--glow-shadow);
        border-color: rgba(37, 99, 235, 0.3);
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        background-color: var(--primary-light);
        color: var(--primary-color);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 20px;
    }

    /* Event Showcase Section */
    .showcase-section {
        padding: 60px 0 100px;
    }

    .showcase-title {
        font-weight: 800;
        font-size: 28px;
        margin-bottom: 8px;
    }

    .event-card {
        background: var(--card-bg);
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid var(--border-color);
        box-shadow: var(--card-shadow);
        transition: var(--transition-fluid);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .event-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: var(--glow-shadow);
        border-color: rgba(37, 99, 235, 0.3);
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
        color: white;
        border-radius: 30px;
        padding: 60px 40px;
        margin-bottom: 100px;
        position: relative;
        overflow: hidden;
        box-shadow: var(--glow-shadow);
    }

    .cta-section::before {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        bottom: -150px;
        left: -100px;
    }
</style>

<div class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="hero-title">Satu Platform untuk Semua Event Kreatif!</h1>
                <p class="hero-subtitle">Beli tiket konser musik, festival, seminar, dan workshop favoritmu secara instan, aman, dan tanpa repot.</p>
                <a href="/events" class="btn-primary-custom px-4 py-3 fs-6">Jelajahi Event Sekarang</a>
            </div>
            <div class="col-lg-5 offset-lg-1 d-none d-lg-block text-center position-relative">
                <div class="position-absolute" style="width: 250px; height: 250px; background: rgba(255, 255, 255, 0.15); filter: blur(60px); border-radius: 50%; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1;"></div>
                <i class="ph-fill ph-ticket hero-ticket-icon"></i>
            </div>
        </div>
    </div>
</div>

<!-- Search Panel (Traveloka/tiket.com style Mockup) -->
<div class="container">
    <div class="search-container">
        <form action="/events" method="GET">
            <div class="row g-3 align-items-center">
                <div class="col-md-4 search-input-group">
                    <div class="search-label">Cari Event</div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="fs-5 text-secondary"><i class="ph-bold ph-magnifying-glass"></i></span>
                        <input type="text" name="title" class="form-control border-0 bg-transparent p-0 fs-6 shadow-none" placeholder="Masukkan nama konser/seminar..." style="color: var(--text-dark);">
                    </div>
                </div>
                <div class="col-md-3 search-input-group">
                    <div class="search-label">Lokasi / Venue</div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="fs-5 text-secondary"><i class="ph-bold ph-map-pin"></i></span>
                        <input type="text" name="venue" class="form-control border-0 bg-transparent p-0 fs-6 shadow-none" placeholder="Jakarta, Bandung, Bali..." style="color: var(--text-dark);">
                    </div>
                </div>
                <div class="col-md-3 search-input-group">
                    <div class="search-label">Kategori</div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="fs-5 text-secondary"><i class="ph-bold ph-tag"></i></span>
                        <select name="category" class="form-select border-0 bg-transparent p-0 fs-6 shadow-none" style="cursor: pointer; color: var(--text-dark);">
                            <option value="">Semua Kategori</option>
                            @if(isset($categories))
                                @foreach($categories as $cat)
                                    @if(!empty($cat))
                                        <option value="{{ $cat }}">{{ $cat }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-2 text-center text-md-end">
                    <button type="submit" class="btn-primary-custom w-100 py-3 text-center border-0">Cari Tiket</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Features Section -->
<div class="features-section">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="fw-bold" style="font-size: 28px;">Mengapa Memilih E-Ticket Plus?</h2>
                <p class="text-muted">Layanan pemesanan tiket dengan validasi masuk instan dan fitur refund terintegrasi.</p>
            </div>
        </div>
        
        <div class="row g-4 justify-content-center mt-3">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="ph-fill ph-lightning"></i></div>
                    <h5 class="fw-bold" style="color: var(--text-dark);">Instant E-Ticket</h5>
                    <p class="mb-0" style="color: var(--text-muted); font-size: 14.5px;">E-Ticket diterbitkan beserta QR Code unik secara langsung sesaat setelah Anda menyelesaikan checkout.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="ph-fill ph-lock-key"></i></div>
                    <h5 class="fw-bold" style="color: var(--text-dark);">Pembayaran Aman</h5>
                    <p class="mb-0" style="color: var(--text-muted); font-size: 14.5px;">Verifikasi status pembayaran secara terpusat untuk menjamin keaslian tiket masuk di lokasi event.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="ph-fill ph-money"></i></div>
                    <h5 class="fw-bold" style="color: var(--text-dark);">Kemudahan Refund</h5>
                    <p class="mb-0" style="color: var(--text-muted); font-size: 14.5px;">Rencana berubah? Ajukan refund tiket dengan mudah melalui portal akun dan pantau status permohonan Anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Event Showcase Section -->
<div class="showcase-section border-top border-bottom py-5" style="background-color: var(--bg-color); border-color: var(--border-color) !important;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="showcase-title"><i class="ph-fill ph-fire text-danger"></i> Event Terpopuler Minggu Ini</h2>
                <p class="mb-0" style="color: var(--text-muted);">Segera pesan tiket Anda sebelum kehabisan kursi!</p>
            </div>
            <a href="/events" class="text-decoration-none fw-bold text-primary">Lihat Semua Event →</a>
        </div>

        @if($events->isEmpty())
            <div class="card p-5 text-center border-0 shadow-sm" style="background-color: var(--card-bg);">
                <div class="card-body empty-state py-4">
                    <div class="empty-state-icon text-primary"><i class="ph-fill ph-ticket"></i></div>
                    <h5 class="fw-bold" style="color: var(--text-dark);">Belum Ada Event Tersedia</h5>
                    <p style="color: var(--text-muted);">Silakan kembali lagi nanti untuk melihat daftar event terbaru kami.</p>
                </div>
            </div>
        @else
            <div class="row g-4">
                @foreach($events as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="event-card">
                            <div class="position-relative">
                                @if($event->poster)
                                    <img
                                        src="{{ asset('storage/'.$event->poster) }}"
                                        class="card-img-top"
                                        style="height: 200px; object-fit: cover;"
                                        alt="Poster {{ $event->title }}"
                                    >
                                @else
                                    <div class="bg-primary text-white d-flex flex-column align-items-center justify-content-center" style="height: 200px;">
                                        <span class="fs-1"><i class="ph-fill ph-ticket"></i></span>
                                        <span class="fw-bold mt-2">E-Ticket Plus</span>
                                    </div>
                                @endif
                                <span class="position-absolute top-0 end-0 m-3 badge bg-dark bg-opacity-75 text-white py-2 px-3 fw-bold" style="border-radius: 30px; font-size: 11px;">
                                    {{ $event->category ?? 'Event' }}
                                </span>
                            </div>

                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="fw-bold mb-2" style="color: var(--text-dark);">{{ $event->title }}</h5>
                                <div class="small mb-3 d-flex align-items-center gap-2" style="color: var(--text-muted);">
                                    <i class="ph-fill ph-map-pin fs-6"></i> <span>{{ $event->venue }}</span>
                                </div>
                                <div class="small mb-3 d-flex align-items-center gap-2" style="color: var(--text-muted);">
                                    <i class="ph-fill ph-calendar-blank fs-6"></i> <span>{{ date('d M Y', strtotime($event->event_date)) }}</span>
                                </div>
                                <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center" style="border-color: var(--border-color) !important;">
                                    <div>
                                        <span class="small d-block" style="color: var(--text-muted);">Mulai Dari</span>
                                        <span class="text-success fw-bold">Rp {{ number_format($event->regular_price, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <a href="/events/{{ $event->id }}" class="btn-secondary-custom py-2 px-3">Detail</a>
                                        <a href="/events/{{ $event->id }}/buy" class="btn-primary-custom py-2 px-3">Beli Tiket</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<!-- CTA Banner Section -->
<div class="container mt-5">
    <div class="cta-section">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2 class="fw-bold text-white mb-2">Ingin Mendapatkan Akses Eksklusif?</h2>
                <p class="text-white-50 mb-0 fs-5">Daftar akun sekarang dan pantau riwayat tiket masuk serta status refund dengan lebih mudah.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                @guest
                    <a href="/register" class="btn btn-light btn-lg px-4 py-3 fw-bold text-primary rounded-3 shadow">Daftar Akun Baru</a>
                @else
                    <a href="/events" class="btn btn-light btn-lg px-4 py-3 fw-bold text-primary rounded-3 shadow">Jelajahi Semua Event</a>
                @endguest
            </div>
        </div>
    </div>
</div>

@endsection

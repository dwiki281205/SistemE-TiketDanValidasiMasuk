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

    .hero-subtitle {
        font-size: 18px;
        opacity: 0.9;
        margin-bottom: 35px;
        font-weight: 400;
    }

    /* Search Box Mockup */
    .search-container {
        background-color: #ffffff;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        color: var(--text-dark);
        margin-top: -40px;
        position: relative;
        z-index: 10;
        border: 1px solid #e2e8f0;
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
        border-right: 1px solid #e2e8f0;
    }

    .search-input-group:last-child {
        border-right: none;
    }

    /* Features Section */
    .features-section {
        padding: 100px 0 60px;
    }

    .feature-card {
        background-color: #ffffff;
        border: 1px solid #f1f5f9;
        border-radius: 20px;
        padding: 30px;
        box-shadow: var(--card-shadow);
        transition: all 0.3s;
        height: 100%;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.08);
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
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid rgba(226, 232, 240, 0.8);
        box-shadow: var(--card-shadow);
        transition: all 0.3s;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.08);
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, #1e3a8a 0%, #1d4ed8 100%);
        color: white;
        border-radius: 30px;
        padding: 60px;
        margin-bottom: 100px;
        position: relative;
        overflow: hidden;
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
            <div class="col-lg-5 offset-lg-1 d-none d-lg-block">
                <div class="bg-white bg-opacity-10 p-3 rounded-4 border border-white border-opacity-20 shadow">
                    <div style="height: 250px; background-color: rgba(255, 255, 255, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <span class="fs-1">🎟️✨</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Search Panel (Traveloka/tiket.com style Mockup) -->
<div class="container">
    <div class="search-container">
        <div class="row g-3 align-items-center">
            <div class="col-md-4 search-input-group">
                <div class="search-label">Cari Event</div>
                <div class="d-flex align-items-center gap-2">
                    <span class="fs-5 text-secondary">🔍</span>
                    <input type="text" class="form-control border-0 bg-transparent p-0 fs-6 shadow-none" placeholder="Masukkan nama konser/seminar...">
                </div>
            </div>
            <div class="col-md-3 search-input-group">
                <div class="search-label">Lokasi / Venue</div>
                <div class="d-flex align-items-center gap-2">
                    <span class="fs-5 text-secondary">📍</span>
                    <input type="text" class="form-control border-0 bg-transparent p-0 fs-6 shadow-none" placeholder="Jakarta, Bandung, Bali...">
                </div>
            </div>
            <div class="col-md-3 search-input-group">
                <div class="search-label">Kategori</div>
                <div class="d-flex align-items-center gap-2">
                    <span class="fs-5 text-secondary">🏷️</span>
                    <select class="form-select border-0 bg-transparent p-0 fs-6 shadow-none" style="cursor: pointer;">
                        <option value="">Semua Kategori</option>
                        <option value="music">Konser Musik</option>
                        <option value="seminar">Seminar / Edukasi</option>
                        <option value="art">Seni & Kreatif</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2 text-center text-md-end">
                <a href="/events" class="btn-primary-custom w-100 py-3 text-center">Cari Tiket</a>
            </div>
        </div>
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
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h5 class="fw-bold text-dark">Instant E-Ticket</h5>
                    <p class="text-muted mb-0">E-Ticket diterbitkan beserta QR Code unik secara langsung sesaat setelah Anda menyelesaikan checkout.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h5 class="fw-bold text-dark">Pembayaran Aman</h5>
                    <p class="text-muted mb-0">Verifikasi status pembayaran secara terpusat untuk menjamin keaslian tiket masuk di lokasi event.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h5 class="fw-bold text-dark">Kemudahan Refund</h5>
                    <p class="text-muted mb-0">Rencana berubah? Ajukan refund tiket dengan mudah melalui portal akun dan pantau status permohonan Anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Event Showcase Section -->
<div class="showcase-section bg-white border-top border-bottom py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="showcase-title">🔥 Event Terpopuler Minggu Ini</h2>
                <p class="text-muted mb-0">Segera pesan tiket Anda sebelum kehabisan kursi!</p>
            </div>
            <a href="/events" class="text-decoration-none fw-bold text-primary">Lihat Semua Event →</a>
        </div>

        @if($events->isEmpty())
            <div class="card p-5 text-center border-0 shadow-sm bg-light">
                <div class="card-body empty-state py-4">
                    <div class="empty-state-icon">🎟️</div>
                    <h5 class="fw-bold text-dark">Belum Ada Event Tersedia</h5>
                    <p class="text-muted">Silakan kembali lagi nanti untuk melihat daftar event terbaru kami.</p>
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
                                        <span class="fs-1">🎫</span>
                                        <span class="fw-bold mt-2">E-Ticket Plus</span>
                                    </div>
                                @endif
                                <span class="position-absolute top-0 end-0 m-3 badge bg-dark bg-opacity-75 text-white py-2 px-3 fw-bold" style="border-radius: 30px; font-size: 11px;">
                                    {{ $event->category ?? 'Event' }}
                                </span>
                            </div>

                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="fw-bold text-dark mb-2">{{ $event->title }}</h5>
                                <div class="text-muted small mb-3 d-flex align-items-center gap-1">
                                    <span>📍</span> <span>{{ $event->venue }}</span>
                                </div>
                                <div class="text-muted small mb-3 d-flex align-items-center gap-1">
                                    <span>📅</span> <span>{{ date('d M Y', strtotime($event->event_date)) }}</span>
                                </div>
                                <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-muted small d-block">Mulai Dari</span>
                                        <span class="text-success fw-bold">Rp {{ number_format($event->regular_price, 0, ',', '.') }}</span>
                                    </div>
                                    <a href="/events/{{ $event->id }}/buy" class="btn-primary-custom py-2 px-3">Beli Tiket</a>
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

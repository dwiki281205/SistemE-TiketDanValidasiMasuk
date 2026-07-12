@extends('layouts.app')

@section('content')

<!-- Hero Neon Banner -->
<div class="hero-banner-custom mb-5" style="background: linear-gradient(135deg, #6366f1 0%, #a855f7 50%, #ec4899 100%) !important; border-radius: 24px; box-shadow: 0 12px 35px rgba(168, 85, 247, 0.25) !important;">
    <h2 class="hero-title-custom text-white fw-bold mb-2">
        ⚡ Admin Analytics Control
    </h2>
    <p class="hero-subtitle-custom text-white-50 fs-5 mb-0">
        Monitoring penjualan tiket, check-in, dan persetujuan pengembalian dana (refund) secara langsung dan real-time.
    </p>
</div>

<!-- Section 1: Event & Tiket Sales -->
<div class="d-flex align-items-center justify-content-between mb-4">
    <h4 class="fw-bold text-dark mb-0">🎯 Ringkasan Penjualan</h4>
    <span class="badge bg-primary bg-opacity-10 text-primary py-2 px-3 fw-bold rounded-pill">Update Real-time</span>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="stat-card-custom stat-card-primary h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6 class="text-uppercase text-muted fw-bold mb-1" style="font-size: 11px; letter-spacing: 1px;">Event Aktif</h6>
                    <h1 class="fw-black text-dark mb-2" style="font-size: 38px; font-weight: 800;">{{ $totalEvents }}</h1>
                </div>
                <div class="stat-icon bg-light-primary">📅</div>
            </div>
            <div class="mt-2 border-top pt-2">
                <small class="text-muted">Total event kreatif terdaftar</small>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card-custom stat-card-info h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6 class="text-uppercase text-muted fw-bold mb-1" style="font-size: 11px; letter-spacing: 1px;">Tiket Terjual</h6>
                    <h1 class="fw-black text-dark mb-2" style="font-size: 38px; font-weight: 800;">{{ $totalTickets }}</h1>
                </div>
                <div class="stat-icon bg-light-info">🎫</div>
            </div>
            <div class="mt-2 border-top pt-2">
                <small class="text-muted">Pembelian oleh pengguna portal</small>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card-custom stat-card-success h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6 class="text-uppercase text-muted fw-bold mb-1" style="font-size: 11px; letter-spacing: 1px;">Checked-In</h6>
                    <h1 class="fw-black text-dark mb-2" style="font-size: 38px; font-weight: 800;">{{ $usedTickets }}</h1>
                </div>
                <div class="stat-icon bg-light-success">✅</div>
            </div>
            <div class="mt-2 border-top pt-2">
                <small class="text-success fw-semibold">✔ {{ $unusedTickets }} Tiket Aktif</small>
            </div>
        </div>
    </div>
</div>

<!-- Section 2: Refund Management -->
<div class="d-flex align-items-center justify-content-between mb-4">
    <h4 class="fw-bold text-dark mb-0">💸 Monitoring Refund Tiket</h4>
    <a href="/refunds" class="text-decoration-none fw-bold small text-primary">Kelola Semua Refund →</a>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-4">
        <!-- Add status-pulse class for pending items to look animated -->
        <div class="stat-card-custom stat-card-warning h-100 {{ $refundPending > 0 ? 'status-pulse' : '' }}">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6 class="text-uppercase text-muted fw-bold mb-1" style="font-size: 11px; letter-spacing: 1px;">Refund Pending</h6>
                    <h1 class="fw-black text-warning mb-2" style="font-size: 38px; font-weight: 800;">{{ $refundPending }}</h1>
                </div>
                <div class="stat-icon bg-light-warning">⏳</div>
            </div>
            <div class="mt-2 border-top pt-2">
                <small class="text-muted">Butuh tindakan / evaluasi segera</small>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card-custom stat-card-purple h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6 class="text-uppercase text-muted fw-bold mb-1" style="font-size: 11px; letter-spacing: 1px;">Refund Disetujui</h6>
                    <h1 class="fw-black text-purple mb-2" style="font-size: 38px; font-weight: 800;">{{ $refundApproved }}</h1>
                </div>
                <div class="stat-icon bg-light-purple">💸</div>
            </div>
            <div class="mt-2 border-top pt-2">
                <small class="text-muted">Pembayaran telah dikembalikan</small>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card-custom stat-card-danger h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6 class="text-uppercase text-muted fw-bold mb-1" style="font-size: 11px; letter-spacing: 1px;">Refund Ditolak</h6>
                    <h1 class="fw-black text-danger mb-2" style="font-size: 38px; font-weight: 800;">{{ $refundRejected }}</h1>
                </div>
                <div class="stat-icon bg-light-danger">❌</div>
            </div>
            <div class="mt-2 border-top pt-2">
                <small class="text-muted">Tiket dikembalikan ke status aktif</small>
            </div>
        </div>
    </div>
</div>

<!-- Section 3: Performance Insights & Logs -->
<div class="row g-4">
    <div class="col-lg-6">
        <div class="card p-4 h-100">
            <h5 class="fw-bold mb-4 text-dark d-flex align-items-center gap-2">
                <span>📈</span> Rasio Kehadiran Peserta (Check-In)
            </h5>
            
            @php
                $percentage = $totalTickets > 0 ? ($usedTickets / $totalTickets) * 100 : 0;
            @endphp

            <div class="text-center my-4">
                <h1 class="fw-black text-success mb-1" style="font-size: 48px; font-weight: 800;">{{ number_format($percentage, 1) }}%</h1>
                <p class="text-muted small">Dari total tiket terjual di semua event</p>
            </div>

            <!-- Animated bootstrap progress bar -->
            <div class="progress mb-4" style="height: 16px; border-radius: 50px; background-color: #f1f5f9;">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: {{ $percentage }}%; border-radius: 50px;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="row g-2 text-center small">
                <div class="col-6 border-end">
                    <span class="text-muted d-block">Checked-in</span>
                    <span class="fw-bold text-success fs-5">{{ $usedTickets }} Tiket</span>
                </div>
                <div class="col-6">
                    <span class="text-muted d-block">Sisa Kuota Aktif</span>
                    <span class="fw-bold text-dark fs-5">{{ $unusedTickets }} Tiket</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card p-4 h-100">
            <h5 class="fw-bold mb-4 text-dark d-flex align-items-center gap-2">
                <span>📋</span> Alur Log Sistem E-Ticket
            </h5>
            
            <div class="d-flex flex-column gap-3">
                <div class="d-flex align-items-start gap-3 p-2 border-bottom">
                    <div class="fs-4 bg-light-primary p-2 rounded-3">🎟️</div>
                    <div>
                        <span class="fw-bold d-block text-dark small" style="font-size: 13.5px;">Customer Membeli E-Ticket</span>
                        <span class="text-muted small">Pembeli memilih Kategori VIP / Regular dan mengisi informasi data pemesan.</span>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3 p-2 border-bottom">
                    <div class="fs-4 bg-light-warning p-2 rounded-3">⏳</div>
                    <div>
                        <span class="fw-bold d-block text-dark small" style="font-size: 13.5px;">Permintaan Refund Terpusat</span>
                        <span class="text-muted small">Customer mengajukan pembatalan tiket. Tiket terkunci dengan status "Refund Pending".</span>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3 p-2">
                    <div class="fs-4 bg-light-success p-2 rounded-3">⚡</div>
                    <div>
                        <span class="fw-bold d-block text-dark small" style="font-size: 13.5px;">Evaluasi Validasi Masuk</span>
                        <span class="text-muted small">Panitia menggunakan gerbang pemindai untuk validasi QR Code masuk.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
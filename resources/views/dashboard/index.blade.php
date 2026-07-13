@extends('layouts.app')

@section('content')

<!-- Hero Neon Banner -->
<div class="hero-banner-custom mb-5" style="background: var(--primary-gradient) !important; border-radius: 24px; box-shadow: 0 12px 35px rgba(37, 99, 235, 0.25) !important;">
    <h2 class="hero-title-custom text-white fw-bold mb-2">
        <i class="ph-bold ph-lightning"></i> Admin Analytics Control
    </h2>
    <p class="hero-subtitle-custom text-white-50 fs-5 mb-0">
        Monitoring penjualan tiket, check-in, dan persetujuan pengembalian dana (refund) secara langsung dan real-time.
    </p>
</div>

<!-- Section 1: Event & Tiket Sales -->
<div class="d-flex align-items-center justify-content-between mb-4">
    <h4 class="fw-bold mb-0" style="color: var(--text-color);"><i class="ph-bold ph-target text-primary"></i> Ringkasan Penjualan</h4>
    <span class="badge bg-primary bg-opacity-10 text-primary py-2 px-3 fw-bold rounded-pill">Update Real-time</span>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="stat-card-custom stat-card-primary h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6 class="text-uppercase text-muted fw-bold mb-1" style="font-size: 11px; letter-spacing: 1px;">Event Aktif</h6>
                    <h1 class="fw-black mb-2" style="font-size: 38px; font-weight: 800; color: var(--text-color);">{{ $totalEvents }}</h1>
                </div>
                <div class="stat-icon bg-light-primary"><i class="ph-fill ph-calendar-blank"></i></div>
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
                    <h1 class="fw-black mb-2" style="font-size: 38px; font-weight: 800; color: var(--text-color);">{{ $totalTickets }}</h1>
                </div>
                <div class="stat-icon bg-light-info"><i class="ph-fill ph-ticket"></i></div>
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
                    <h1 class="fw-black mb-2" style="font-size: 38px; font-weight: 800; color: var(--text-color);">{{ $usedTickets }}</h1>
                </div>
                <div class="stat-icon bg-light-success"><i class="ph-bold ph-check"></i></div>
            </div>
            <div class="mt-2 border-top pt-2" style="border-color: var(--border-color) !important;">
                <small class="text-success fw-semibold"><i class="ph-bold ph-check"></i> {{ $unusedTickets }} Tiket Aktif</small>
            </div>
        </div>
    </div>
</div>

<!-- Section 2: Refund Management -->
<div class="d-flex align-items-center justify-content-between mb-4">
    <h4 class="fw-bold mb-0" style="color: var(--text-color);"><i class="ph-bold ph-money text-success"></i> Monitoring Refund Tiket</h4>
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
                <div class="stat-icon bg-light-warning"><i class="ph-bold ph-hourglass"></i></div>
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
                    <h1 class="fw-black text-purple mb-2" style="font-size: 38px; font-weight: 800; color: #a855f7;">{{ $refundApproved }}</h1>
                </div>
                <div class="stat-icon bg-light-purple"><i class="ph-fill ph-money"></i></div>
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
                <div class="stat-icon bg-light-danger"><i class="ph-bold ph-x"></i></div>
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
        <div class="card p-4 h-100" style="background-color: var(--card-bg); border-color: var(--border-color);">
            <h5 class="fw-bold mb-4 d-flex align-items-center gap-2" style="color: var(--text-color);">
                <i class="ph-bold ph-chart-line-up text-success fs-3"></i> Rasio Kehadiran Peserta (Check-In)
            </h5>
            
            @php
                $percentage = $totalTickets > 0 ? ($usedTickets / $totalTickets) * 100 : 0;
            @endphp

            <div class="text-center my-4">
                <h1 class="fw-black text-success mb-1" style="font-size: 48px; font-weight: 800;">{{ number_format($percentage, 1) }}%</h1>
                <p class="text-muted small">Dari total tiket terjual di semua event</p>
            </div>

            <!-- Animated bootstrap progress bar -->
            <div class="progress mb-4" style="height: 16px; border-radius: 50px; background-color: var(--sidebar-hover);">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: {{ $percentage }}%; border-radius: 50px;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="row g-2 text-center small">
                <div class="col-6 border-end">
                    <span class="text-muted d-block">Checked-in</span>
                    <span class="fw-bold text-success fs-5">{{ $usedTickets }} Tiket</span>
                </div>
                <div class="col-6">
                    <span class="text-muted d-block">Sisa Kuota Aktif</span>
                    <span class="fw-bold fs-5" style="color: var(--text-color);">{{ $unusedTickets }} Tiket</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card p-4 h-100" style="background-color: var(--card-bg); border-color: var(--border-color);">
            <h5 class="fw-bold mb-4 d-flex align-items-center gap-2" style="color: var(--text-color);">
                <i class="ph-bold ph-clipboard-text text-primary fs-3"></i> Alur Log Sistem E-Ticket
            </h5>
            
            <div class="d-flex flex-column gap-3">
                <div class="d-flex align-items-start gap-3 p-2 border-bottom" style="border-color: var(--border-color) !important;">
                    <div class="fs-4 bg-light-primary p-2 rounded-3"><i class="ph-fill ph-ticket"></i></div>
                    <div>
                        <span class="fw-bold d-block small" style="font-size: 13.5px; color: var(--text-color);">Customer Membeli E-Ticket</span>
                        <span class="text-muted small">Pembeli memilih Kategori VIP / Regular dan mengisi informasi data pemesan.</span>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3 p-2 border-bottom" style="border-color: var(--border-color) !important;">
                    <div class="fs-4 bg-light-warning p-2 rounded-3"><i class="ph-bold ph-hourglass"></i></div>
                    <div>
                        <span class="fw-bold d-block small" style="font-size: 13.5px; color: var(--text-color);">Permintaan Refund Terpusat</span>
                        <span class="text-muted small">Customer mengajukan pembatalan tiket. Tiket terkunci dengan status "Refund Pending".</span>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3 p-2">
                    <div class="fs-4 bg-light-success p-2 rounded-3"><i class="ph-bold ph-lightning"></i></div>
                    <div>
                        <span class="fw-bold d-block small" style="font-size: 13.5px; color: var(--text-color);">Evaluasi Validasi Masuk</span>
                        <span class="text-muted small">Panitia menggunakan gerbang pemindai untuk validasi QR Code masuk.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
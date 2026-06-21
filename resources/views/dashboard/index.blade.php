@extends('layouts.app')

@section('content')

<div class="hero-banner mb-4">
    <h2 class="hero-title">
        🎫 E-Ticket Management
    </h2>

    <p class="hero-subtitle">
        Kelola event, penjualan tiket, dan validasi peserta
        dalam satu platform yang mudah digunakan.
    </p>
</div>

<div class="row g-4">

    <div class="col-md-3">
        <div class="card p-4 stat-card">
            <h6 class="text-muted">Total Event</h6>
            <h2 class="fw-bold text-primary">
                {{ $totalEvents }}
            </h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-4 stat-card">
            <h6 class="text-muted">Total Tiket</h6>
            <h2 class="fw-bold text-success">
                {{ $totalTickets }}
            </h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-4 stat-card">
            <h6 class="text-muted">Tiket Digunakan</h6>
            <h2 class="fw-bold text-warning">
                {{ $usedTickets }}
            </h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-4 stat-card">
            <h6 class="text-muted">Belum Digunakan</h6>
            <h2 class="fw-bold text-danger">
                {{ $unusedTickets }}
            </h2>
        </div>
    </div>

</div>

<div class="card mt-4 p-4">

    <h5 class="fw-bold mb-3">
        Ringkasan Sistem
    </h5>

    <ul class="list-group">

        <li class="list-group-item">
            Total Event Aktif :
            <strong>{{ $totalEvents }}</strong>
        </li>

        <li class="list-group-item">
            Total Tiket Terjual :
            <strong>{{ $totalTickets }}</strong>
        </li>

        <li class="list-group-item">
            Tiket Sudah Digunakan :
            <strong>{{ $usedTickets }}</strong>
        </li>

        <li class="list-group-item">
            Tiket Belum Digunakan :
            <strong>{{ $unusedTickets }}</strong>
        </li>

    </ul>

</div>

@endsection
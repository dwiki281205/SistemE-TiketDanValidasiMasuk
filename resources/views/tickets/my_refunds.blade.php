@extends('layouts.main')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">💰 Riwayat Refund Saya</h2>
        <p class="text-muted mb-0">Daftar permohonan pengembalian dana tiket yang pernah Anda ajukan.</p>
    </div>
</div>

@if($tickets->isEmpty())
    <div class="card p-5 text-center border-0 shadow-sm">
        <div class="card-body empty-state">
            <div class="empty-state-icon">💰</div>
            <h5 class="fw-bold text-dark">Tidak Ada Pengajuan Refund</h5>
            <p class="text-muted mb-4">Semua pengajuan refund tiket Anda akan ditampilkan di halaman ini.</p>
            <a href="/events" class="btn btn-primary">Cari & Beli Tiket</a>
        </div>
    </div>
@else
    <div class="table-custom-wrapper shadow-sm">
        <table class="table table-custom table-hover">
            <thead>
                <tr>
                    <th>Kode Tiket</th>
                    <th>Nama Event</th>
                    <th>Kategori Tiket</th>
                    <th>Tanggal Pembelian</th>
                    <th>Status Refund</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td class="fw-bold text-primary">
                            {{ $ticket->ticket_code }}
                        </td>
                        <td class="fw-semibold text-dark">
                            {{ $ticket->event->title }}
                        </td>
                        <td>
                            @if($ticket->ticket_type == 'VIP')
                                <span class="badge bg-warning text-dark fw-bold">⭐ VIP</span>
                            @else
                                <span class="badge bg-primary text-white fw-bold">🎫 Regular</span>
                            @endif
                        </td>
                        <td class="text-muted">
                            {{ $ticket->created_at->format('d M Y H:i') }}
                        </td>
                        <td>
                            @if($ticket->refund_status == 'approved')
                                <span class="badge-pill-custom status-approved">
                                    <span>✔</span> Approved
                                </span>
                            @elseif($ticket->refund_status == 'pending')
                                <span class="badge-pill-custom status-pending">
                                    <span>⏳</span> Pending
                                </span>
                            @elseif($ticket->refund_status == 'rejected')
                                <span class="badge-pill-custom status-rejected">
                                    <span>✖</span> Rejected
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="/tickets/{{ $ticket->id }}" class="btn btn-secondary btn-sm rounded-pill px-3">
                                Lihat E-Ticket
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection

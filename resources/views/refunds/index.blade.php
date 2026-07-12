@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">💰 Kelola Pengajuan Refund</h2>
        <p class="text-muted mb-0">Tinjau, setujui, atau tolak permohonan pengembalian dana tiket dari pembeli.</p>
    </div>
</div>

@if($tickets->isEmpty())
    <div class="card p-5 text-center border-0 shadow-sm">
        <div class="card-body empty-state">
            <div class="empty-state-icon">💸</div>
            <h5 class="fw-bold text-dark">Tidak Ada Pengajuan Refund</h5>
            <p class="text-muted">Semua permohonan refund dari pembeli akan muncul di sini.</p>
        </div>
    </div>
@else
    <div class="table-custom-wrapper shadow-sm">
        <table class="table table-custom table-hover">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Pembeli</th>
                    <th>Event</th>
                    <th>Tipe Tiket</th>
                    <th>Status Refund</th>
                    <th>Aksi Evaluasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td class="fw-bold text-primary">
                            {{ $ticket->ticket_code }}
                        </td>
                        <td class="fw-semibold text-dark">
                            {{ $ticket->buyer_name }}
                        </td>
                        <td>
                            {{ $ticket->event->title }}
                        </td>
                        <td>
                            @if($ticket->ticket_type == 'VIP')
                                <span class="badge bg-warning text-dark fw-bold">⭐ VIP</span>
                            @else
                                <span class="badge bg-primary text-white fw-bold">🎫 Regular</span>
                            @endif
                        </td>
                        <td>
                            @if($ticket->refund_status == 'pending')
                                <span class="badge-pill-custom status-pending">
                                    <span>⏳</span> Pending
                                </span>
                            @elseif($ticket->refund_status == 'approved')
                                <span class="badge-pill-custom status-approved">
                                    <span>✔</span> Approved
                                </span>
                            @elseif($ticket->refund_status == 'rejected')
                                <span class="badge-pill-custom status-rejected">
                                    <span>✖</span> Rejected
                                </span>
                            @endif
                        </td>
                        <td>
                            @if($ticket->refund_status == 'pending')
                                <form action="/refunds/{{ $ticket->id }}/approve" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menyetujui refund ini? Status pembayaran tiket akan berubah menjadi Refunded.')">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm rounded-pill px-3">
                                        Approve
                                    </button>
                                </form>

                                <form action="/refunds/{{ $ticket->id }}/reject" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menolak refund ini?')">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">
                                        Reject
                                    </button>
                                </form>
                            @else
                                <span class="text-muted small fst-italic">Selesai dievaluasi</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection
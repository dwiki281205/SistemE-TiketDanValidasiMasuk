@extends(auth()->check() && auth()->user()->role === 'admin' ? 'layouts.app' : 'layouts.main')

@section('content')

<div class="container py-5">
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1 text-dark"><i class="ph-bold ph-file-text text-primary"></i> Riwayat Pembelian Tiket</h2>
        <p class="text-muted mb-0">Daftar lengkap transaksi pembelian tiket seluruh event.</p>
    </div>
</div>

@if($tickets->isEmpty())
    <div class="card p-5 text-center border-0 shadow-sm" style="background-color: var(--card-bg);">
        <div class="card-body empty-state">
            <div class="empty-state-icon text-primary"><i class="ph-fill ph-file-text" style="font-size: 48px;"></i></div>
            <h5 class="fw-bold text-dark mt-3">Belum Ada Pembelian Tiket</h5>
            <p class="text-muted">Semua tiket yang dibeli oleh pelanggan akan muncul di sini.</p>
        </div>
    </div>
@else
    <div class="table-responsive table-custom-wrapper shadow-sm">
        <table class="table table-custom table-hover">
            <thead>
                <tr>
                    <th>Kode Tiket</th>
                    <th>Nama Pembeli</th>
                    <th>Email</th>
                    <th>Nama Event</th>
                    <th>Kategori</th>
                    <th>Status Check-In</th>
                    <th>Status Tiket</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td class="fw-bold text-primary">
                            {{ $ticket->ticket_code }}
                        </td>
                        <td>
                            {{ $ticket->buyer_name }}
                        </td>
                        <td class="text-muted">
                            {{ $ticket->email }}
                        </td>
                        <td class="fw-semibold">
                            {{ $ticket->event->title }}
                        </td>
                        <td>
                            @if($ticket->ticket_type == 'VIP')
                                <span class="badge bg-warning text-dark fw-bold" style="font-size: 11px;"><i class="ph-fill ph-star"></i> VIP</span>
                            @else
                                <span class="badge bg-primary text-white fw-bold" style="font-size: 11px;"><i class="ph-fill ph-ticket"></i> Regular</span>
                            @endif
                        </td>
                        <td>
                            @if($ticket->is_used)
                                <span class="badge-pill-custom status-rejected">Sudah Digunakan</span>
                            @else
                                <span class="badge-pill-custom status-approved">Belum Digunakan</span>
                            @endif
                        </td>
                        <td>
                            @if($ticket->refund_status == 'approved')
                                <span class="badge-pill-custom status-refunded">Refunded</span>
                            @elseif($ticket->refund_status == 'pending')
                                <span class="badge-pill-custom status-pending">Refund Pending</span>
                            @elseif($ticket->refund_status == 'rejected')
                                <span class="badge-pill-custom status-rejected">Refund Rejected</span>
                            @elseif($ticket->payment_status == 'pending')
                                <span class="badge-pill-custom status-pending">Menunggu Pembayaran</span>
                            @else
                                <span class="badge-pill-custom status-approved">Active / Paid</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex flex-wrap gap-1">
                                <a href="/tickets/{{ $ticket->id }}" class="btn btn-secondary btn-sm rounded-pill px-3">
                                    Detail
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
</div>

@endsection
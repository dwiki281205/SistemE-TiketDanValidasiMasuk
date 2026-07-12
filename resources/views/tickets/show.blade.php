@extends(auth()->check() && auth()->user()->role === 'admin' ? 'layouts.app' : 'layouts.main')

@section('content')

<!-- Realistic Ticket CSS -->
<style>
    .realistic-ticket {
        background: #ffffff;
        border-radius: 24px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 15px 35px rgba(0,0,0,0.07);
        position: relative;
        max-width: 600px;
        margin: 40px auto;
        overflow: hidden;
    }
    
    .ticket-header {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        color: #ffffff;
        padding: 30px;
        text-align: center;
        position: relative;
    }
    
    .ticket-body {
        padding: 35px 30px;
        text-align: center;
        background-color: #ffffff;
    }

    .ticket-footer {
        background-color: #f8fafc;
        padding: 25px 30px;
        border-top: 1px solid #f1f5f9;
        text-align: center;
    }
    
    .ticket-dashed-line {
        border-top: 2.5px dashed #e2e8f0;
        margin: 0;
        position: relative;
        height: 0;
    }
    
    .ticket-cutout-left, .ticket-cutout-right {
        width: 30px;
        height: 30px;
        background: #f8fafc; /* Matches body background */
        border-radius: 50%;
        position: absolute;
        top: -15px;
        z-index: 10;
        box-shadow: inset 0 2px 5px rgba(0,0,0,0.03);
    }
    
    .ticket-cutout-left {
        left: -15px;
    }
    
    .ticket-cutout-right {
        right: -15px;
    }
    
    .watermark-refunded {
        border: 4px dashed #ef4444;
        color: #ef4444;
        font-size: 32px;
        font-weight: 900;
        text-transform: uppercase;
        padding: 12px 30px;
        border-radius: 12px;
        display: inline-block;
        transform: rotate(-8deg);
        margin: 25px 0;
        letter-spacing: 3px;
        box-shadow: 0 0 20px rgba(239, 68, 68, 0.1);
        background: rgba(239, 68, 68, 0.05);
    }

    .watermark-used {
        border: 4px dashed #7e22ce;
        color: #7e22ce;
        font-size: 32px;
        font-weight: 900;
        text-transform: uppercase;
        padding: 12px 30px;
        border-radius: 12px;
        display: inline-block;
        transform: rotate(-8deg);
        margin: 25px 0;
        letter-spacing: 3px;
        background: rgba(126, 34, 206, 0.05);
    }
    
    .qr-container {
        padding: 20px;
        background: #ffffff;
        border-radius: 16px;
        display: inline-block;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        border: 1px solid #f1f5f9;
    }
</style>

<div class="mb-4 text-center">
    <a href="/events" class="text-decoration-none fw-semibold text-secondary d-inline-flex align-items-center gap-1">
        <span>←</span> Kembali ke Daftar Event
    </a>
</div>

<!-- Refund Status Banner Notifications -->
@if($ticket->refund_status == 'pending')
    <div class="alert alert-warning border-0 shadow-sm max-w-2xl mx-auto mb-4" role="alert" style="border-radius: 16px; max-width: 600px; background-color: #fef3c7; color: #92400e;">
        <div class="d-flex align-items-center gap-2">
            <span class="fs-4">⏳</span>
            <div>
                <strong>Refund Pending:</strong> Permintaan refund untuk tiket ini sedang diproses oleh administrator.
            </div>
        </div>
    </div>
@elseif($ticket->refund_status == 'approved')
    <div class="alert alert-danger border-0 shadow-sm max-w-2xl mx-auto mb-4" role="alert" style="border-radius: 16px; max-width: 600px; background-color: #fee2e2; color: #991b1b;">
        <div class="d-flex align-items-center gap-2">
            <span class="fs-4">💸</span>
            <div>
                <strong>Refund Disetujui:</strong> Pembayaran telah dikembalikan. Tiket ini dinyatakan <strong>dibatalkan (void)</strong> dan tidak dapat digunakan.
            </div>
        </div>
    </div>
@elseif($ticket->refund_status == 'rejected')
    <div class="alert alert-danger border-0 shadow-sm max-w-2xl mx-auto mb-4" role="alert" style="border-radius: 16px; max-width: 600px; background-color: #fee2e2; color: #991b1b;">
        <div class="d-flex align-items-center gap-2">
            <span class="fs-4">❌</span>
            <div>
                <strong>Refund Ditolak:</strong> Permintaan refund Anda telah ditolak oleh admin. Tiket Anda tetap aktif dan dapat digunakan.
            </div>
        </div>
    </div>
@endif

<div class="realistic-ticket">
    <!-- Header -->
    <div class="ticket-header">
        <h5 class="text-white-50 text-uppercase fw-bold mb-1" style="font-size: 11px; letter-spacing: 2px;">E-Ticket Masuk</h5>
        <h3 class="fw-bold text-white mb-2">{{ $ticket->event->title }}</h3>
        <p class="text-white-50 mb-0 small">📍 {{ $ticket->event->venue }}</p>
    </div>
    
    <!-- Cutout dashed divider -->
    <div class="position-relative">
        <div class="ticket-cutout-left"></div>
        <div class="ticket-cutout-right"></div>
        <div class="ticket-dashed-line"></div>
    </div>
    
    <!-- Body -->
    <div class="ticket-body">
        <div class="row g-3 text-start mb-4">
            <div class="col-6">
                <small class="text-muted d-block uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">NAMA PEMBELI</small>
                <span class="fw-bold text-dark fs-6">{{ $ticket->buyer_name }}</span>
            </div>
            <div class="col-6">
                <small class="text-muted d-block uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">KODE TIKET</small>
                <span class="fw-bold text-primary fs-6">{{ $ticket->ticket_code }}</span>
            </div>
            <div class="col-6">
                <small class="text-muted d-block uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">TANGGAL EVENT</small>
                <span class="fw-semibold text-dark">{{ date('d M Y', strtotime($ticket->event->event_date)) }}</span>
            </div>
            <div class="col-6">
                <small class="text-muted d-block uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">KATEGORI TIKET</small>
                @if($ticket->ticket_type == 'VIP')
                    <span class="badge bg-warning text-dark fw-bold">⭐ VIP Ticket</span>
                @else
                    <span class="badge bg-primary text-white fw-bold">🎫 Regular Ticket</span>
                @endif
            </div>
            <div class="col-6">
                <small class="text-muted d-block uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">STATUS CHECK-IN</small>
                @if($ticket->is_used)
                    <span class="badge status-rejected fw-bold">Sudah Digunakan</span>
                @else
                    <span class="badge status-approved fw-bold">Belum Digunakan</span>
                @endif
            </div>
            <div class="col-6">
                <small class="text-muted d-block uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">STATUS REFUND / BAYAR</small>
                @if($ticket->refund_status == 'approved')
                    <span class="badge status-refunded fw-bold">REFUNDED</span>
                @elseif($ticket->refund_status == 'pending')
                    <span class="badge status-pending fw-bold">REFUND PENDING</span>
                @elseif($ticket->refund_status == 'rejected')
                    <span class="badge status-rejected fw-bold">REFUND REJECTED</span>
                @else
                    <span class="badge status-approved fw-bold">PAID</span>
                @endif
            </div>
        </div>

        <div class="my-4">
            @if($ticket->refund_status == 'approved')
                <!-- Watermark for approved refund (VOIDS the QR Code) -->
                <div class="watermark-refunded">
                    Refund Approved / Void
                </div>
            @elseif($ticket->is_used)
                <!-- Watermark for checked-in ticket -->
                <div class="watermark-used">
                    Checked In / Used
                </div>
            @else
                <!-- Render QR Code -->
                <div class="qr-container">
                    {!! $ticket->qr_code_data !!}
                </div>
                <div class="mt-2">
                    <small class="text-muted">Tunjukkan QR Code di atas kepada panitia untuk validasi masuk.</small>
                </div>
            @endif
        </div>
    </div>
    
    <!-- Footer actions -->
    <div class="ticket-footer d-flex justify-content-center gap-3">
        @if(!$ticket->is_used && $ticket->refund_status == 'none')
            <form action="{{ route('refund.request', $ticket->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengajukan refund untuk tiket ini?')">
                @csrf
                <button type="submit" class="btn btn-danger d-flex align-items-center gap-2">
                    <span>💸</span> Ajukan Refund Tiket
                </button>
            </form>
        @endif
        <a href="/events" class="btn btn-secondary">Kembali</a>
    </div>
</div>

@endsection
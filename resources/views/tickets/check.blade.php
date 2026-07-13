@extends('layouts.app')

@section('content')

<div class="max-w-md mx-auto" style="max-width: 600px; margin-top: 40px;">
    <div class="card shadow border-0 overflow-hidden">
        <div class="card-header text-white p-4 text-center position-relative" style="background: var(--primary-gradient);">
            <div class="position-absolute" style="width: 150px; height: 150px; background: rgba(255, 255, 255, 0.1); filter: blur(40px); border-radius: 50%; top: -30px; left: -30px;"></div>
            
            <span class="fs-1 d-block mb-2"><i class="ph-bold ph-magnifying-glass"></i></span>
            <h4 class="fw-bold mb-1 text-white">Validasi E-Ticket Masuk</h4>
            <p class="text-white-50 mb-0 small">Masukkan kode tiket unik customer untuk memverifikasi keaslian dan status check-in.</p>
        </div>
        
        <div class="card-body p-5">
            <form method="POST" action="/check-ticket">
                @csrf
                <div class="mb-4">
                    <label for="ticket_code" class="form-label text-secondary text-uppercase fw-bold" style="font-size: 11px; letter-spacing: 1px;">Kode Tiket Unik</label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0 bg-white" style="border-radius: 12px 0 0 12px; border: 1.5px solid var(--border-color); border-right: none !important; color: var(--text-muted);"><i class="ph-bold ph-ticket fs-5"></i></span>
                        <input type="text" name="ticket_code" id="ticket_code" class="form-control border-start-0" placeholder="Contoh: TKT-20260712-0001" style="border-radius: 0 12px 12px 0;" required autocomplete="off">
                    </div>
                    <div class="form-text text-muted mt-2">Kode tiket biasanya tertera pada email atau file PDF yang dimiliki pembeli.</div>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-3 d-flex align-items-center justify-content-center gap-2">
                    <i class="ph-bold ph-lightning"></i> Jalankan Validasi
                </button>
            </form>
        </div>

        <div class="card-footer p-4 border-top text-center text-muted small" style="background-color: var(--card-bg); border-color: var(--border-color) !important;">
            <i class="ph-fill ph-lightbulb text-warning fs-5"></i> <strong>Informasi:</strong> Tiket yang valid akan secara otomatis ditandai sebagai "Sudah Digunakan" setelah proses validasi ini selesai.
        </div>
    </div>
</div>

@endsection
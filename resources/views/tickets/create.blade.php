@extends(auth()->check() && auth()->user()->role === 'admin' ? 'layouts.app' : 'layouts.main')

@section('content')

<div class="mb-4">
    <a href="/events" class="text-decoration-none fw-semibold text-secondary d-inline-flex align-items-center gap-1">
        <span>←</span> Batal & Kembali
    </a>
</div>

<div class="row g-4" style="max-width: 1000px;">
    <!-- Form Beli Tiket -->
    <div class="col-md-7">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-white border-bottom p-4">
                <h4 class="fw-bold text-dark mb-0">🛒 Checkout Tiket</h4>
                <small class="text-muted">Isi data pemesan dengan lengkap untuk memproses tiket Anda.</small>
            </div>
            
            <div class="card-body p-4">
                <form action="/tickets" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">

                    <div class="mb-3">
                        <label for="buyer_name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="buyer_name" id="buyer_name" class="form-control" placeholder="Masukkan nama sesuai kartu identitas" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Contoh: nama@domain.com" required>
                        <div class="form-text text-muted">E-ticket beserta QR Code akan dikirim dan dapat diakses menggunakan email ini.</div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor WhatsApp / HP</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Contoh: 08123456789" required>
                    </div>

                    <div class="mb-4">
                        <label for="ticket_type" class="form-label">Kategori Tiket</label>
                        <select name="ticket_type" id="ticket_type" class="form-select" required>
                            <option value="Regular">
                                Regular - Rp {{ number_format($event->regular_price, 0, ',', '.') }}
                            </option>
                            <option value="VIP">
                                VIP - Rp {{ number_format($event->vip_price, 0, ',', '.') }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label d-block fw-bold">Metode Pembayaran (QRIS)</label>
                        <div class="text-center p-3 border rounded-3 mb-3" style="background-color: var(--card-bg);">
                            <img src="{{ asset('images/qris.png') }}" alt="QRIS Payment" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                            <p class="mt-2 mb-0 small text-muted">Scan QRIS di atas untuk melakukan pembayaran tiket Anda.</p>
                        </div>
                        
                        <label for="payment_proof" class="form-label">Unggah Bukti Pembayaran <span class="text-danger">*</span></label>
                        <input type="file" name="payment_proof" id="payment_proof" class="form-control" accept="image/*" required>
                        <div class="form-text text-muted">Format: JPG, PNG. Maksimal 2MB.</div>
                    </div>

                    <hr class="my-4">

                    <button type="submit" class="btn btn-success w-100 py-3 d-flex align-items-center justify-content-center gap-2">
                        <span>💳</span> Selesaikan Pembelian
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Ringkasan Event -->
    <div class="col-md-5">
        <div class="card border-0 bg-dark text-white p-4 h-100 d-flex flex-column justify-content-between position-relative overflow-hidden" style="min-height: 350px; background-color: #0f172a !important;">
            <!-- Subtle glow background -->
            <div class="position-absolute" style="width: 200px; height: 200px; background: rgba(99, 102, 241, 0.15); filter: blur(50px); border-radius: 50%; top: -30px; right: -30px;"></div>
            
            <div>
                <span class="badge bg-primary px-3 py-2 rounded-pill fw-bold mb-3" style="font-size: 11px;">RINGKASAN EVENT</span>
                <h3 class="fw-bold text-white mb-4">{{ $event->title }}</h3>

                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="fs-4">📍</div>
                        <div>
                            <small class="text-muted d-block uppercase fw-bold" style="font-size: 10px;">LOKASI / VENUE</small>
                            <span class="fw-semibold text-white-50">{{ $event->venue }}</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <div class="fs-4">📅</div>
                        <div>
                            <small class="text-muted d-block uppercase fw-bold" style="font-size: 10px;">TANGGAL & WAKTU</small>
                            <span class="fw-semibold text-white-50">{{ date('d M Y', strtotime($event->event_date)) }}</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <div class="fs-4">💺</div>
                        <div>
                            <small class="text-muted d-block uppercase fw-bold" style="font-size: 10px;">SISA KUOTA</small>
                            <span class="fw-semibold text-white-50">{{ $event->total_seats }} Kursi</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 pt-4 border-top border-secondary">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small">Mulai Dari</span>
                        <h4 class="fw-bold text-success mb-0">Rp {{ number_format($event->regular_price, 0, ',', '.') }}</h4>
                    </div>
                    <span class="badge bg-secondary px-3 py-2 rounded-pill" style="font-size: 11px;">Instant E-Ticket</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
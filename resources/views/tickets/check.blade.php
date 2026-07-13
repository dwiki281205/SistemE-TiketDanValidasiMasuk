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
            <form method="POST" action="/check-ticket" id="validation-form">
                @csrf
                <!-- Scanner Section -->
                <div id="scanner-container" class="mb-4 text-center" style="display: none;">
                    <div id="reader" class="rounded overflow-hidden shadow-sm border border-primary mb-3"></div>
                    <button type="button" id="stop-scan-btn" class="btn btn-outline-danger btn-sm">
                        <i class="ph-bold ph-stop-circle"></i> Matikan Kamera
                    </button>
                </div>

                <div class="mb-4">
                    <label for="ticket_code" class="form-label text-secondary text-uppercase fw-bold d-flex justify-content-between align-items-center" style="font-size: 11px; letter-spacing: 1px;">
                        <span>Kode Tiket Unik</span>
                        <button type="button" id="start-scan-btn" class="btn btn-sm btn-outline-primary" style="font-size: 11px;">
                            <i class="ph-bold ph-camera"></i> Scan QR Code
                        </button>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0 bg-white" style="border-radius: 12px 0 0 12px; border: 1.5px solid var(--border-color); border-right: none !important; color: var(--text-muted);"><i class="ph-bold ph-ticket fs-5"></i></span>
                        <input type="text" name="ticket_code" id="ticket_code" class="form-control border-start-0" placeholder="Contoh: TKT-20260712-0001" style="border-radius: 0 12px 12px 0;" required autocomplete="off">
                    </div>
                    <div class="form-text text-muted mt-2">Ketik manual kode tiket atau klik tombol <strong>Scan QR Code</strong> untuk menggunakan kamera.</div>
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

<!-- HTML5 QR Code Scanner Library -->
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startBtn = document.getElementById('start-scan-btn');
        const stopBtn = document.getElementById('stop-scan-btn');
        const scannerContainer = document.getElementById('scanner-container');
        const ticketCodeInput = document.getElementById('ticket_code');
        const validationForm = document.getElementById('validation-form');
        
        let html5QrcodeScanner = null;

        startBtn.addEventListener('click', function() {
            scannerContainer.style.display = 'block';
            startBtn.style.display = 'none';
            
            // Initialize scanner if not already
            if (!html5QrcodeScanner) {
                html5QrcodeScanner = new Html5QrcodeScanner(
                    "reader", { fps: 10, qrbox: {width: 250, height: 250}, aspectRatio: 1.0 }, false);
                
                html5QrcodeScanner.render(onScanSuccess, onScanFailure);
            }
        });

        stopBtn.addEventListener('click', function() {
            if (html5QrcodeScanner) {
                html5QrcodeScanner.clear().then(() => {
                    scannerContainer.style.display = 'none';
                    startBtn.style.display = 'inline-block';
                    html5QrcodeScanner = null; // Reset
                }).catch(error => {
                    console.error("Failed to clear scanner", error);
                });
            }
        });

        function onScanSuccess(decodedText, decodedResult) {
            // Stop scanning
            if (html5QrcodeScanner) {
                html5QrcodeScanner.clear();
                scannerContainer.style.display = 'none';
                startBtn.style.display = 'inline-block';
                html5QrcodeScanner = null;
            }
            
            // Play a beep sound (optional)
            
            // Set input value
            ticketCodeInput.value = decodedText;
            
            // Optional: Auto submit the form
            // validationForm.submit();
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning
            // console.warn(`Code scan error = ${error}`);
        }
    });
</script>

@endsection
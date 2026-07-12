@extends('layouts.app')

@section('content')

<div class="mb-4">
    <a href="/events" class="text-decoration-none fw-semibold text-secondary d-inline-flex align-items-center gap-1">
        <span>←</span> Kembali ke Daftar Event
    </a>
</div>

<div class="card shadow-sm max-w-2xl" style="max-width: 800px;">
    <div class="card-header bg-white border-bottom p-4">
        <h4 class="fw-bold text-dark mb-0">✨ Tambah Event Baru</h4>
        <small class="text-muted">Lengkapi formulir di bawah ini untuk membuat event baru dan mulai menjual tiket.</small>
    </div>
    
    <div class="card-body p-4">
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="title" class="form-label">Nama Event</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Contoh: Konser Musik Jakarta 2026" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="venue" class="form-label">Lokasi / Venue</label>
                    <input type="text" name="venue" id="venue" class="form-control" placeholder="Contoh: Hall Basket Senayan, Jakarta" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="event_date" class="form-label">Tanggal Event</label>
                    <input type="date" name="event_date" id="event_date" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="total_seats" class="form-label">Jumlah Kursi / Kuota</label>
                    <input type="number" name="total_seats" id="total_seats" class="form-control" placeholder="Contoh: 500" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="regular_price" class="form-label">Harga Regular (Rp)</label>
                    <input type="number" name="regular_price" id="regular_price" class="form-control" placeholder="Contoh: 150000" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="vip_price" class="form-label">Harga VIP (Rp)</label>
                    <input type="number" name="vip_price" id="vip_price" class="form-control" placeholder="Contoh: 350000" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="poster" class="form-label">Poster Event (Gambar)</label>
                <input type="file" name="poster" id="poster" class="form-control" accept="image/*">
                <div class="form-text text-muted">Format yang disarankan: JPG, PNG, atau WEBP. Maksimal 2MB.</div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="/events" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary px-4">Simpan Event</button>
            </div>
        </form>
    </div>
</div>

@endsection

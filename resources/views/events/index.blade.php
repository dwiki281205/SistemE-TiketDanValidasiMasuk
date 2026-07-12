@extends(auth()->check() && auth()->user()->role === 'admin' ? 'layouts.app' : 'layouts.main')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">🎫 Eksplorasi Event</h2>
        <p class="text-muted mb-0">Temukan dan kelola event seru terbaru di platform kami.</p>
    </div>

    @if(auth()->user()->role === 'admin')
        <a href="/events/create" class="btn btn-primary d-flex align-items-center gap-2">
            <span>+</span> Tambah Event Baru
        </a>
    @endif
</div>

@if($events->isEmpty())
    <div class="card p-5 text-center border-0 shadow-sm">
        <div class="card-body empty-state">
            <div class="empty-state-icon">🎟️</div>
            <h5 class="fw-bold text-dark">Belum Ada Event Tersedia</h5>
            <p class="text-muted mb-4">Silakan tambahkan event baru terlebih dahulu untuk memulai penjualan tiket.</p>
            <a href="/events/create" class="btn btn-primary">+ Tambah Event</a>
        </div>
    </div>
@else
    <div class="row g-4">
        @foreach($events as $event)
            <div class="col-lg-4 col-md-6">
                <div class="card card-hover border-0 h-100 d-flex flex-column">
                    <div class="position-relative">
                        @if($event->poster)
                            <img
                                src="{{ asset('storage/'.$event->poster) }}"
                                class="card-img-top"
                                style="height: 220px; object-fit: cover;"
                                alt="Poster {{ $event->title }}"
                            >
                        @else
                            <div class="bg-primary text-white d-flex flex-column align-items-center justify-content-center" style="height: 220px;">
                                <span class="fs-1">🎫</span>
                                <span class="fw-bold mt-2">E-Ticket Plus</span>
                            </div>
                        @endif
                        
                        <span class="position-absolute top-0 end-0 m-3 badge bg-dark bg-opacity-75 text-white py-2 px-3 fw-bold" style="border-radius: 30px; font-size: 12px;">
                            {{ $event->category ?? 'Event' }}
                        </span>
                    </div>

                    <div class="card-body d-flex flex-column p-4">
                        <h4 class="fw-bold text-dark mb-3">
                            {{ $event->title }}
                        </h4>

                        <div class="text-muted mb-2 d-flex align-items-center gap-2" style="font-size: 13.5px;">
                            <span>📍</span> <span>{{ $event->venue }}</span>
                        </div>

                        <div class="text-muted mb-2 d-flex align-items-center gap-2" style="font-size: 13.5px;">
                            <span>📅</span> <span>{{ date('d M Y', strtotime($event->event_date)) }}</span>
                        </div>

                        <div class="text-muted mb-3 d-flex align-items-center gap-2" style="font-size: 13.5px;">
                            <span>💺</span> <span>{{ $event->total_seats }} Kursi Tersedia</span>
                        </div>

                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted small d-block">Harga Regular</span>
                                <h5 class="text-success fw-bold mb-0">
                                    Rp {{ number_format($event->regular_price,0,',','.') }}
                                </h5>
                            </div>
                            <div class="text-end">
                                <span class="text-muted small d-block">Harga VIP</span>
                                <h5 class="text-warning fw-bold mb-0">
                                    Rp {{ number_format($event->vip_price,0,',','.') }}
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white border-0 p-4 pt-0">
                        <div class="d-flex gap-2">
                            <a href="/events/{{ $event->id }}/buy" class="btn btn-success flex-fill d-flex align-items-center justify-content-center gap-2">
                                <span>🛒</span> Beli Tiket
                            </a>

                            @if(auth()->user()->role === 'admin')
                                <a href="/events/{{ $event->id }}/edit" class="btn btn-warning d-flex align-items-center justify-content-center px-3" title="Edit Event">
                                    <span>✏️</span>
                                </a>

                                <form action="/events/{{ $event->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger d-flex align-items-center justify-content-center px-3" title="Hapus Event">
                                        <span>🗑️</span>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
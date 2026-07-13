@extends(auth()->check() && auth()->user()->role === 'admin' ? 'layouts.app' : 'layouts.main')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1" style="color: var(--text-dark);"><i class="ph-bold ph-ticket text-primary"></i> Eksplorasi Event</h2>
        <p class="mb-0" style="color: var(--text-muted);">Temukan dan kelola event seru terbaru di platform kami.</p>
    </div>

    @if(auth()->user()->role === 'admin')
        <a href="/events/create" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="ph-bold ph-plus"></i> Tambah Event Baru
        </a>
    @endif
</div>

@if($events->isEmpty())
    <div class="card p-5 text-center border-0 shadow-sm" style="background-color: var(--card-bg);">
        <div class="card-body empty-state">
            <div class="empty-state-icon text-primary"><i class="ph-fill ph-ticket" style="font-size: 48px;"></i></div>
            <h5 class="fw-bold mt-3" style="color: var(--text-dark);">Belum Ada Event Tersedia</h5>
            <p class="mb-4" style="color: var(--text-muted);">Silakan tambahkan event baru terlebih dahulu untuk memulai penjualan tiket.</p>
            <a href="/events/create" class="btn btn-primary"><i class="ph-bold ph-plus"></i> Tambah Event</a>
        </div>
    </div>
@else
    <div class="row g-4">
        @foreach($events as $event)
            <div class="col-lg-4 col-md-6">
                <div class="card card-hover h-100 d-flex flex-column" style="background-color: var(--card-bg); border: 1px solid var(--border-color); box-shadow: var(--card-shadow); border-radius: 20px;">
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
                                <span class="fs-1"><i class="ph-fill ph-ticket"></i></span>
                                <span class="fw-bold mt-2">E-Ticket Plus</span>
                            </div>
                        @endif
                        
                        <span class="position-absolute top-0 end-0 m-3 badge bg-dark bg-opacity-75 text-white py-2 px-3 fw-bold" style="border-radius: 30px; font-size: 12px;">
                            {{ $event->category ?? 'Event' }}
                        </span>
                    </div>

                    <div class="card-body d-flex flex-column p-4">
                        <h4 class="fw-bold mb-3" style="color: var(--text-dark);">
                            {{ $event->title }}
                        </h4>

                        <div class="mb-2 d-flex align-items-center gap-2" style="color: var(--text-muted); font-size: 13.5px;">
                            <i class="ph-fill ph-map-pin fs-6"></i> <span>{{ $event->venue }}</span>
                        </div>

                        <div class="mb-2 d-flex align-items-center gap-2" style="color: var(--text-muted); font-size: 13.5px;">
                            <i class="ph-fill ph-calendar-blank fs-6"></i> <span>{{ date('d M Y', strtotime($event->event_date)) }}</span>
                        </div>

                        <div class="mb-3 d-flex align-items-center gap-2" style="color: var(--text-muted); font-size: 13.5px;">
                            <i class="ph-fill ph-armchair fs-6"></i> <span>{{ $event->total_seats }} Kursi Tersedia</span>
                        </div>

                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center" style="border-color: var(--border-color) !important;">
                            <div>
                                <span class="small d-block" style="color: var(--text-muted);">Harga Regular</span>
                                <h5 class="text-success fw-bold mb-0">
                                    Rp {{ number_format($event->regular_price,0,',','.') }}
                                </h5>
                            </div>
                            <div class="text-end">
                                <span class="small d-block" style="color: var(--text-muted);">Harga VIP</span>
                                <h5 class="text-warning fw-bold mb-0">
                                    Rp {{ number_format($event->vip_price,0,',','.') }}
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer p-4 pt-0" style="background-color: var(--card-bg); border-color: var(--border-color); border-radius: 0 0 20px 20px;">
                        <div class="d-flex gap-2">
                            <a href="/events/{{ $event->id }}/buy" class="btn btn-success flex-fill d-flex align-items-center justify-content-center gap-2">
                                <i class="ph-bold ph-shopping-cart"></i> Beli Tiket
                            </a>

                            @if(auth()->user()->role === 'admin')
                                <a href="/events/{{ $event->id }}/edit" class="btn btn-warning d-flex align-items-center justify-content-center px-3" title="Edit Event">
                                    <i class="ph-bold ph-pencil-simple"></i>
                                </a>

                                <form action="/events/{{ $event->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger d-flex align-items-center justify-content-center px-3" title="Hapus Event">
                                        <i class="ph-bold ph-trash"></i>
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
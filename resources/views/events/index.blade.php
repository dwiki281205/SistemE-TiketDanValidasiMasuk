@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">🎫 Event Tersedia</h2>
        <p class="text-muted mb-0">Kelola dan jual tiket event dengan mudah</p>
    </div>

    <a href="/events/create" class="btn btn-primary">
        + Tambah Event
    </a>
</div>

@if($events->isEmpty())
    <div class="alert alert-info">
        Belum ada event yang tersedia.
    </div>
@endif

<div class="row g-4">

@foreach($events as $event)

<div class="col-lg-4 col-md-6">

    <div class="card border-0 shadow-sm h-100">

        @if($event->poster)
            <img
                src="{{ asset('storage/'.$event->poster) }}"
                class="card-img-top"
                style="height:220px; object-fit:cover;"
            >
        @else
            <div
                class="bg-primary text-white d-flex align-items-center justify-content-center"
                style="height:220px;"
            >
                <h3>🎫 E-Ticket</h3>
            </div>
        @endif

        <div class="card-body">

            <h4 class="fw-bold">
                {{ $event->title }}
            </h4>

            <div class="text-muted mb-2">
                📍 {{ $event->venue }}
            </div>

            <div class="text-muted mb-2">
                📅 {{ date('d M Y', strtotime($event->event_date)) }}
            </div>

            <div class="text-muted mb-3">
                💺 {{ $event->total_seats }} Kursi
            </div>

            <h5 class="text-success fw-bold">
                Rp {{ number_format($event->price,0,',','.') }}
            </h5>

        </div>

        <div class="card-footer bg-white border-0">

            <div class="d-flex gap-2">

                <a href="/events/{{ $event->id }}/buy"
                   class="btn btn-success flex-fill">
                    Beli Tiket
                </a>

                <a href="/events/{{ $event->id }}/edit"
                   class="btn btn-warning">
                    Edit
                </a>

                <form
                    action="/events/{{ $event->id }}"
                    method="POST"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        class="btn btn-danger"
                        onclick="return confirm('Hapus event ini?')"
                    >
                        Hapus
                    </button>
                </form>

            </div>

        </div>

    </div>

</div>

@endforeach

</div>

@endsection
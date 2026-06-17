@extends('layouts.app')

@section('content')

<h2 class="mb-3">Daftar Event</h2>

<a href="/events/create" class="btn btn-primary mb-3">+ Tambah Event</a>

@if($events->isEmpty())
    <div class="alert alert-info">Belum ada event</div>
@endif

<div class="row">
@foreach($events as $event)
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $event->title }}</h5>
                <p>{{ $event->venue }}</p>

                <a href="/events/{{ $event->id }}/buy" class="btn btn-success btn-sm">Beli Tiket</a>
                <a href="/events/{{ $event->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                <form action="/events/{{ $event->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endforeach
</div>

@endsection
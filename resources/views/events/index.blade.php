<a href="/events/create">Tambah Event</a>

<h1>Daftar Event</h1>

@foreach($events as $event)
    <p>{{ $event->title }} - {{ $event->venue }}</p>
@endforeach
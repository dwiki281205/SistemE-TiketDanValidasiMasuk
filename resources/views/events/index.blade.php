<h1>Daftar Event</h1>

<a href="/events/create">Tambah Event</a>

@foreach($events as $event)
    <p>
        {{ $event->title }} - {{ $event->venue }}
        <a href="/events/{{ $event->id }}/edit">Edit</a>
    </p>
@endforeach
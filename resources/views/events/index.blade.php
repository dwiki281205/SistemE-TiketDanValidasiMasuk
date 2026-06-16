@foreach($events as $event)
    <p>
        {{ $event->title }} - {{ $event->venue }}

        <a href="/events/{{ $event->id }}/edit">Edit</a>

        <form action="/events/{{ $event->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </p>
@endforeach
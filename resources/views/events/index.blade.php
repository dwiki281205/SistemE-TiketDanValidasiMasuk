<h1>Daftar Event</h1>

<!-- 🔥 Tombol Tambah Event -->
<a href="/events/create">Tambah Event</a>

<br><br>

<!-- 🔥 Loop Data -->
@foreach($events as $event)
    <p>
        {{ $event->title }} - {{ $event->venue }}

        <!-- tombol edit -->
        <a href="/events/{{ $event->id }}/edit">Edit</a>

        <!-- tombol delete -->
        <form action="/events/{{ $event->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>

        <!-- 🔥 tombol beli tiket -->
        <a href="/events/{{ $event->id }}/buy">Beli Tiket</a>
    </p>
@endforeach
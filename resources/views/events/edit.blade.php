<h1>Edit Event</h1>

<form action="/events/{{ $event->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $event->title }}"><br><br>
    <input type="text" name="venue" value="{{ $event->venue }}"><br><br>
    <input type="date" name="event_date" value="{{ $event->event_date }}"><br><br>
    <input type="number" name="total_seats" value="{{ $event->total_seats }}"><br><br>
    <input type="number" name="price" value="{{ $event->price }}"><br><br>
    <div class="mb-3">
    <label>Poster Event</label>
    <input type="file" name="poster" class="form-control">
</div>

    <button type="submit">Update</button>
</form>
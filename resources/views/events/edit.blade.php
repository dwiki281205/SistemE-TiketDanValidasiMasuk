<h1>Edit Event</h1>

<form action="/events/{{ $event->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $event->title }}"><br><br>
    <input type="text" name="venue" value="{{ $event->venue }}"><br><br>
    <input type="date" name="event_date" value="{{ $event->event_date }}"><br><br>
    <input type="number" name="total_seats" value="{{ $event->total_seats }}"><br><br>
    <input type="number" name="price" value="{{ $event->price }}"><br><br>

    <button type="submit">Update</button>
</form>
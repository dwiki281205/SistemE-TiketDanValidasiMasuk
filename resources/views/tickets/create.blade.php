<h1>Beli Tiket untuk: {{ $event->title }}</h1>

<form action="/tickets" method="POST">
    @csrf

    <input type="hidden" name="event_id" value="{{ $event->id }}">

    <input type="text" name="buyer_name" placeholder="Nama"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="text" name="phone" placeholder="No HP"><br><br>

    <button type="submit">Beli</button>
</form>
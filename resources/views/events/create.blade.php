<h1>Tambah Event</h1>

<form action="/events" method="POST">
    @csrf

    <input type="text" name="title" placeholder="Nama Event"><br><br>
    <input type="text" name="venue" placeholder="Lokasi"><br><br>
    <input type="date" name="event_date"><br><br>
    <input type="number" name="total_seats" placeholder="Jumlah Kursi"><br><br>
    <input type="number" name="price" placeholder="Harga"><br><br>

    <button type="submit">Simpan</button>
</form>

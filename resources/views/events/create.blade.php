<h1>Tambah Event</h1>

<form action="/events" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Nama Event"><br><br>
    <input type="text" name="venue" placeholder="Lokasi"><br><br>
    <input type="date" name="event_date"><br><br>
    <input type="number" name="total_seats" placeholder="Jumlah Kursi"><br><br>
    <input type="number"
       name="vip_price"
       placeholder="Harga VIP"><br><br>

<input type="number"
       name="regular_price"
       placeholder="Harga Regular"><br><br>
    <div class="mb-3">
    <label>Poster Event</label>
    <input type="file" name="poster" class="form-control">
</div>

    <button type="submit">Simpan</button>
</form>

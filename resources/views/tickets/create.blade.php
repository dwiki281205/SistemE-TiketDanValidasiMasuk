<h1>Beli Tiket untuk: {{ $event->title }}</h1>

<form action="/tickets" method="POST">
    @csrf

    <input type="hidden" name="event_id" value="{{ $event->id }}">

    <input type="text" name="buyer_name" placeholder="Nama"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="text" name="phone" placeholder="No HP"><br><br>
    <div class="mb-3">
    <label class="form-label">
        Kategori Tiket
    </label>

    <select
        name="ticket_type"
        class="form-control"
        required>

       <option value="Regular">
    Regular - Rp {{ number_format($event->regular_price,0,',','.') }}
</option>

<option value="VIP">
    VIP - Rp {{ number_format($event->vip_price,0,',','.') }}
</option>

    </select>
</div>

    <button type="submit">Beli</button>
</form>
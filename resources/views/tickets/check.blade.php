<h1>Cek Tiket</h1>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif

<form method="POST" action="/check-ticket">
    @csrf
    <input type="text" name="ticket_code" placeholder="Masukkan kode tiket">
    <button type="submit">Cek</button>
</form>
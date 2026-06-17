<h1>Tiket Berhasil Dibeli 🎉</h1>

<p><strong>Nama:</strong> {{ $ticket->buyer_name }}</p>
<p><strong>Email:</strong> {{ $ticket->email }}</p>
<p><strong>No HP:</strong> {{ $ticket->phone }}</p>

<hr>

<p><strong>Event:</strong> {{ $ticket->event->title }}</p>
<p><strong>Tempat:</strong> {{ $ticket->event->venue }}</p>

<hr>

<p><strong>Kode Tiket:</strong> {{ $ticket->ticket_code }}</p>
<p><strong>QR Code:</strong></p>

{!! $ticket->qr_code_data !!}

<br>

<a href="/events">Kembali ke Event</a>
@extends('layouts.app')

@section('content')

<h2 class="fw-bold mb-4">
    📄 Riwayat Pembelian Tiket
</h2>

<div class="card p-4">

    <table class="table table-hover">

        <thead>
            <tr>
                <th>Kode Tiket</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Event</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

        @foreach($tickets as $ticket)

            <tr>

                <td>
                    {{ $ticket->ticket_code }}
                </td>

                <td>
                    {{ $ticket->buyer_name }}
                </td>

                <td>
                    {{ $ticket->email }}
                </td>

                <td>
                    {{ $ticket->event->title }}
                </td>

                <td>

                    @if($ticket->is_used)

                        <span class="badge bg-success">
                            Sudah Digunakan
                        </span>

                    @else

                        <span class="badge bg-warning text-dark">
                            Belum Digunakan
                        </span>

                    @endif

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection
<!DOCTYPE html>
<html>
    <style>
body{
    background:#f8fafc;
}

.card{
    border-radius:18px;
    transition:0.25s;
}

.card:hover{
    transform:translateY(-5px);
}

.navbar{
    box-shadow:0 2px 15px rgba(0,0,0,0.1);
}
</style>
<head>
    <title>E-Ticket</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">

        <a class="navbar-brand" href="/events">
            E-Ticket
        </a>

        <div>
            <a href="/dashboard" class="btn btn-info btn-sm">
                Dashboard
            </a>

            <a href="/events" class="btn btn-primary btn-sm">
                Event
            </a>

            <a href="/check-ticket" class="btn btn-warning btn-sm">
                Validasi Tiket
            </a>

            @auth
                <span class="text-white me-2">
                    {{ Auth::user()->name }}
                </span>

                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button class="btn btn-danger btn-sm">
                        Logout
                    </button>
                </form>
            @else
                <a href="/login" class="btn btn-success btn-sm">
                    Login
                </a>
            @endauth

        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
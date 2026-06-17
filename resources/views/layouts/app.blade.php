<!DOCTYPE html>
<html>
<head>
    <title>E-Ticket</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a href="/events" class="navbar-brand">E-Ticket</a>
        <a href="/check-ticket" class="btn btn-warning">Cek Tiket</a>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
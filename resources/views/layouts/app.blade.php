<!DOCTYPE html>
<html>
<head>
    <title>E-Ticket Admin</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f8fafc;
            margin:0;
        }

        .sidebar{
            width:260px;
            height:100vh;
            position:fixed;
            left:0;
            top:0;
            background:#111827;
            color:white;
            padding:25px;
        }

        .brand{
            font-size:24px;
            font-weight:700;
            margin-bottom:40px;
        }

        .sidebar a{
            display:block;
            color:#d1d5db;
            text-decoration:none;
            padding:12px 15px;
            border-radius:10px;
            margin-bottom:10px;
            transition:0.2s;
        }

        .sidebar a:hover{
            background:#1f2937;
            color:white;
        }

        .content{
            margin-left:260px;
            min-height:100vh;
        }

        .topbar{
            background:white;
            padding:18px 30px;
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
        }

        .main-content{
            padding:30px;
        }

        .card{
            border:none;
            border-radius:18px;
            transition:0.25s;
            box-shadow:0 5px 15px rgba(0,0,0,0.06);
        }

        .card:hover{
            transform:translateY(-5px);
        }

        .user-box{
            font-weight:600;
            color:#374151;
        }

        .logout-btn{
            border:none;
            background:#ef4444;
            color:white;
            padding:8px 15px;
            border-radius:10px;
        }
        .active-menu{
    background:#4F46E5 !important;
    color:white !important;
    font-weight:600;
}

.hero-banner{
    background:linear-gradient(
        135deg,
        #4F46E5,
        #7C3AED
    );

    color:white;
    padding:35px;
    border-radius:22px;
    box-shadow:0 10px 30px rgba(79,70,229,0.25);
}

.hero-title{
    font-size:32px;
    font-weight:700;
    margin-bottom:10px;
}

.hero-subtitle{
    margin:0;
    opacity:0.9;
}

.stat-card{
    border-left:5px solid #4F46E5;
}

    </style>
</head>
<body>

@auth

<div class="sidebar">

    <div class="brand">
        🎫 E-Ticket
    </div>

    <a href="/dashboard"
       class="{{ request()->is('dashboard') ? 'active-menu' : '' }}">
        📊 Dashboard
    </a>
<a href="/events"
   class="{{ request()->is('events*') ? 'active-menu' : '' }}">
    🎟 Event
</a>

<a href="/tickets"
   class="{{ request()->is('tickets*') ? 'active-menu' : '' }}">
    📄 Riwayat Tiket
</a>

<a href="/check-ticket"
   class="{{ request()->is('check-ticket*') ? 'active-menu' : '' }}">
    ✅ Validasi Tiket
</a>

</div>

<div class="content">

    <div class="topbar d-flex justify-content-between align-items-center">
<div>
    <h5 class="mb-0 fw-bold">
        Selamat Datang 👋
    </h5>

    <small class="text-muted">
        Kelola event dan tiket dengan mudah
    </small>
</div>

        <div class="d-flex align-items-center gap-3">

            <span class="user-box">
                👤 {{ Auth::user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button class="logout-btn">
                    Logout
                </button>
            </form>

        </div>

    </div>

    <div class="main-content">
        @yield('content')
    </div>

</div>

@else

<div class="container mt-5">
    @yield('content')
</div>

@endauth

</body>
</html>
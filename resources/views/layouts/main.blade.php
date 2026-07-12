<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket Plus - Platform Tiket Event Terpercaya</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme Custom CSS -->
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-light: #eff6ff;
            --bg-color: #f8fafc;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --card-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
            --transition-speed: 0.3s;
        }

        /* Smooth Entry Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-dark);
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        /* Top Navbar styling */
        .navbar-custom {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.01);
        }

        .navbar-brand-custom {
            font-size: 22px;
            font-weight: 800;
            color: var(--primary-color) !important;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .navbar-brand-custom .icon {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 14px;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
        }

        .nav-link-custom {
            font-weight: 600;
            color: #475569 !important;
            font-size: 14.5px;
            padding: 8px 16px !important;
            border-radius: 8px;
            transition: all var(--transition-speed);
        }

        .nav-link-custom:hover {
            color: var(--primary-color) !important;
            background-color: var(--primary-light);
        }

        .nav-link-custom.active {
            color: var(--primary-color) !important;
            background-color: var(--primary-light);
        }

        /* Buttons */
        .btn-primary-custom {
            background-color: var(--primary-color);
            color: white !important;
            border: none;
            padding: 10px 22px;
            font-weight: 700;
            font-size: 14px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
            transition: all var(--transition-speed);
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary-custom:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.3);
        }

        .btn-secondary-custom {
            background-color: transparent;
            color: #475569 !important;
            border: 1px solid #cbd5e1;
            padding: 10px 22px;
            font-weight: 600;
            font-size: 14px;
            border-radius: 10px;
            transition: all var(--transition-speed);
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary-custom:hover {
            background-color: #f1f5f9;
            border-color: #94a3b8;
        }

        /* Main Content wrapper */
        .main-wrapper {
            flex: 1;
        }

        /* Footer styling */
        .footer-custom {
            background-color: #0f172a;
            color: #94a3b8;
            padding: 50px 0 30px;
            border-top: 1px solid #1e293b;
        }

        .footer-title {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-link {
            color: #94a3b8;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            transition: color var(--transition-speed);
        }

        .footer-link:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand-custom" href="/">
                <span class="icon">🎫</span> <span>E-Ticket Plus</span>
            </a>
            
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto gap-1">
                    <li class="nav-item">
                        <a class="nav-link-custom {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom {{ request()->is('events') || request()->is('events/*/buy') ? 'active' : '' }}" href="/events">Cari Event</a>
                    </li>
                    
                    @auth
                        <li class="nav-item">
                            <a class="nav-link-custom {{ request()->is('tickets') ? 'active' : '' }}" href="/tickets">Tiket Saya</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-custom {{ request()->is('my-refunds') ? 'active' : '' }}" href="/my-refunds">Refund Saya</a>
                        </li>
                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link-custom text-primary fw-bold" href="/dashboard">⚙️ Admin Panel</a>
                            </li>
                        @endif
                    @endauth
                </ul>
                
                <div class="d-flex align-items-center gap-3">
                    @auth
                        <span class="fw-semibold text-secondary small">👋 {{ Auth::user()->name }}</span>
                        
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn-secondary-custom py-2 px-3 small">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="/login" class="btn-secondary-custom py-2 px-4">Masuk</a>
                        <a href="/register" class="btn-primary-custom py-2 px-4">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-wrapper">
        <!-- Alert Messages -->
        @if(session('success'))
            <div class="container mt-4">
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert" style="border-radius: 16px; background-color: #d1fae5; color: #065f46;">
                    <div class="d-flex align-items-center gap-2">
                        <span>✨</span>
                        <div><strong>Berhasil!</strong> {{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container mt-4">
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert" style="border-radius: 16px; background-color: #fee2e2; color: #991b1b;">
                    <div class="d-flex align-items-center gap-2">
                        <span>⚠️</span>
                        <div><strong>Error!</strong> {{ session('error') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <div class="animate-fade-in-up">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-md-5">
                    <h5 class="footer-title">🎫 E-Ticket Plus</h5>
                    <p class="text-white-50" style="font-size: 14px;">Platform penyedia tiket event terlengkap dan terpercaya. Kami mempermudah pembelian tiket konser musik, seminar, workshop, dan acara kreatif lainnya dengan teknologi instant checkout dan validasi QR Code.</p>
                </div>
                <div class="col-md-3 offset-md-1">
                    <h6 class="footer-title">Tautan Cepat</h6>
                    <a href="/" class="footer-link">Beranda</a>
                    <a href="/events" class="footer-link">Cari Event</a>
                    <a href="/login" class="footer-link">Masuk</a>
                </div>
                <div class="col-md-3">
                    <h6 class="footer-title">Layanan Bantuan</h6>
                    <span class="footer-link">FAQ / Pertanyaan Umum</span>
                    <span class="footer-link">Syarat & Ketentuan Penggunaan</span>
                    <span class="footer-link">Kebijakan Pengembalian Dana</span>
                </div>
            </div>
            <hr class="border-secondary mb-4">
            <div class="row text-center text-white-50" style="font-size: 13.5px;">
                <p class="mb-0">© 2026 E-Ticket Plus. Hak Cipta Dilindungi. Dibuat untuk Proyek Akhir Mahasiswa.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

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

    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <!-- Theme Custom CSS -->
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-gradient: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            --primary-light: #eff6ff;
            --primary-dark: #1e3a8a;
            --bg-color: #f8fafc;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --navbar-bg: rgba(255, 255, 255, 0.95);
            --border-color: #e2e8f0;
            --card-bg: #ffffff;
            --card-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.08);
            --glow-shadow: 0 15px 35px -5px rgba(37, 99, 235, 0.4), 0 0 20px rgba(37, 99, 235, 0.3);
            --transition-fluid: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        [data-theme="dark"] {
            --primary-color: #3b82f6;
            --primary-hover: #60a5fa;
            --primary-gradient: linear-gradient(135deg, #60a5fa 0%, #2563eb 100%);
            --primary-light: rgba(59, 130, 246, 0.15);
            --primary-dark: #1d4ed8;
            --bg-color: #0f172a;
            --text-dark: #f1f5f9;
            --text-muted: #94a3b8;
            --navbar-bg: rgba(30, 41, 59, 0.95);
            --border-color: #334155;
            --card-bg: #1e293b;
            --card-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.4);
            --glow-shadow: 0 15px 35px -5px rgba(59, 130, 246, 0.5), 0 0 25px rgba(59, 130, 246, 0.4);
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
            overflow-x: hidden;
        }

        /* Top Navbar styling */
        .navbar-custom {
            background-color: var(--navbar-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
            transition: var(--transition-fluid);
        }

        /* Utility Overrides for Dark Mode */
        .text-dark { color: var(--text-dark) !important; }
        .text-muted { color: var(--text-muted) !important; }
        .text-secondary { color: var(--text-muted) !important; }
        .bg-white { background-color: var(--card-bg) !important; }

        /* Form Inputs */
        .form-control, .form-select {
            color: var(--text-dark) !important;
            background-color: var(--card-bg) !important;
            border-color: var(--border-color);
        }
        
        .form-control::placeholder {
            color: var(--text-muted) !important;
            opacity: 0.8;
        }

        .form-control:focus, .form-select:focus {
            background-color: var(--card-bg) !important;
            color: var(--text-dark) !important;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px var(--primary-light);
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
            transition: var(--transition-fluid);
        }

        .nav-link-custom:hover {
            color: var(--primary-color) !important;
            background-color: var(--primary-light);
            transform: translateY(-2px);
        }

        .nav-link-custom.active {
            color: var(--primary-color) !important;
            background-color: var(--primary-light);
        }

        /* Buttons */
        .btn-primary-custom {
            background: var(--primary-gradient);
            color: white !important;
            border: none;
            padding: 10px 22px;
            font-weight: 700;
            font-size: 14px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(37, 99, 235, 0.25);
            transition: var(--transition-fluid);
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-primary-custom::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, transparent 100%);
            opacity: 0;
            transition: var(--transition-fluid);
            z-index: -1;
        }

        .btn-primary-custom:hover {
            transform: translateY(-4px) scale(1.03);
            box-shadow: var(--glow-shadow);
        }
        .btn-primary-custom:hover::after {
            opacity: 1;
        }

        .btn-secondary-custom {
            background-color: transparent;
            color: var(--text-muted) !important;
            border: 1.5px solid var(--border-color);
            padding: 10px 22px;
            font-weight: 600;
            font-size: 14px;
            border-radius: 12px;
            transition: var(--transition-fluid);
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary-custom:hover {
            background-color: var(--card-bg);
            color: var(--primary-color) !important;
            border-color: var(--primary-color);
            transform: translateY(-4px) scale(1.03);
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1);
        }

        /* Main Content wrapper */
        .main-wrapper {
            flex: 1;
        }

        /* Table styling */
        .table-custom-wrapper {
            background: var(--card-bg);
            border-radius: 16px;
            border: 1px solid var(--border-color);
            overflow-x: auto;
            overflow-y: hidden;
        }
        
        .table-custom {
            margin-bottom: 0;
            color: var(--text-dark);
            --bs-table-bg: transparent;
            --bs-table-color: var(--text-dark);
            --bs-table-hover-bg: var(--border-color);
            --bs-table-hover-color: var(--text-dark);
            --bs-table-striped-bg: transparent;
            --bs-table-active-bg: var(--border-color);
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
            color: var(--primary-color);
        }

        /* Custom Alerts for Dark Mode */
        .alert-custom {
            border-radius: 16px;
            border: 1px solid transparent;
        }
        .alert-success-custom {
            background-color: rgba(16, 185, 129, 0.15);
            color: #059669;
            border-color: rgba(16, 185, 129, 0.2);
        }
        [data-theme="dark"] .alert-success-custom {
            color: #34d399;
        }
        .alert-danger-custom {
            background-color: rgba(239, 68, 68, 0.15);
            color: #dc2626;
            border-color: rgba(239, 68, 68, 0.2);
        }
        [data-theme="dark"] .alert-danger-custom {
            color: #f87171;
        }

        /* Fix for select options in dark mode */
        option {
            background-color: var(--card-bg);
            color: var(--text-dark);
        }
    </style>
</head>
<body>

    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand-custom" href="/">
                <span class="icon"><i class="ph-bold ph-ticket"></i></span> <span>E-Ticket Plus</span>
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
                        <a class="nav-link-custom {{ request()->is('events') || request()->is('events/*/buy') ? 'active' : '' }}" href="/events">Daftar Event</a>
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
                                <a class="nav-link-custom text-primary fw-bold" href="/dashboard"><i class="ph-bold ph-gear"></i> Admin Panel</a>
                            </li>
                        @endif
                    @endauth
                </ul>
                
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-sm btn-outline-secondary border-0 d-flex align-items-center justify-content-center" id="theme-toggle" style="width: 36px; height: 36px; border-radius: 50%;">
                        <i class="ph-bold ph-moon fs-5" id="theme-icon"></i>
                    </button>
                    @auth
                        <span class="fw-semibold text-secondary small"><i class="ph-fill ph-hand-waving text-warning"></i> {{ Auth::user()->name }}</span>
                        
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
                <div class="alert alert-custom alert-success-custom alert-dismissible fade show shadow-sm" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="ph-fill ph-sparkle fs-5"></i>
                        <div><strong>Berhasil!</strong> {{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container mt-4">
                <div class="alert alert-custom alert-danger-custom alert-dismissible fade show shadow-sm" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="ph-fill ph-warning fs-5"></i>
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
                    <h5 class="footer-title"><i class="ph-bold ph-ticket"></i> E-Ticket Plus</h5>
                    <p class="text-white-50" style="font-size: 14px;">Platform penyedia tiket event terlengkap dan terpercaya. Kami mempermudah pembelian tiket konser musik, seminar, workshop, dan acara kreatif lainnya dengan teknologi instant checkout dan validasi QR Code.</p>
                </div>
                <div class="col-md-3 offset-md-1">
                    <h6 class="footer-title">Tautan Cepat</h6>
                    <a href="/" class="footer-link">Beranda</a>
                    <a href="/events" class="footer-link">Daftar Event</a>
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

    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Theme Toggle Script -->
    <script>
        // Inisialisasi AOS (Animate On Scroll)
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-out-cubic',
                once: true,
                offset: 50
            });
        }

        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        
        // Cek preferensi tema sebelumnya
        const currentTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', currentTheme);
        updateIcon(currentTheme);

        themeToggleBtn.addEventListener('click', () => {
            let theme = document.documentElement.getAttribute('data-theme');
            let newTheme = theme === 'dark' ? 'light' : 'dark';
            
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateIcon(newTheme);
        });

        function updateIcon(theme) {
            if (theme === 'dark') {
                themeIcon.classList.remove('ph-moon');
                themeIcon.classList.add('ph-sun');
            } else {
                themeIcon.classList.remove('ph-sun');
                themeIcon.classList.add('ph-moon');
            }
        }
    </script>
</body>
</html>

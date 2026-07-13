<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'E-Ticket') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <!-- Custom Premium Stylesheet -->
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            --secondary-gradient: linear-gradient(135deg, #64748b 0%, #475569 100%);
            --info-gradient: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
            --success-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            --danger-gradient: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-light: #eff6ff;
            --primary-dark: #1e3a8a;

            --bg-color: #f8fafc;
            --text-color: #0f172a;
            --sidebar-bg: #ffffff;
            --sidebar-hover: #f1f5f9;
            --sidebar-text: #475569;
            --topbar-bg: #ffffff;
            --border-color: #e2e8f0;
            --card-bg: #ffffff;
            --card-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.08);
            --card-hover-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15);
            --glow-shadow: 0 15px 35px -5px rgba(37, 99, 235, 0.4), 0 0 20px rgba(37, 99, 235, 0.3);
            --transition-speed: 0.3s;
            --transition-fluid: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        [data-theme="dark"] {
            --primary-color: #3b82f6;
            --primary-hover: #60a5fa;
            --primary-light: rgba(59, 130, 246, 0.15);
            --primary-dark: #1d4ed8;

            --bg-color: #0f172a;
            --text-color: #f1f5f9;
            --sidebar-bg: #1e293b;
            --sidebar-hover: #334155;
            --sidebar-text: #94a3b8;
            --topbar-bg: #1e293b;
            --border-color: #334155;
            --card-bg: #1e293b;
            --card-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.4);
            --card-hover-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.5);
            --glow-shadow: 0 15px 35px -5px rgba(59, 130, 246, 0.5), 0 0 25px rgba(59, 130, 246, 0.4);
        }

        [data-theme="dark"] {
            --bg-color: #0f172a;
            --text-color: #f1f5f9;
            --sidebar-bg: #020617;
            --sidebar-hover: #1e293b;
            --topbar-bg: #1e293b;
            --border-color: #334155;
            --card-bg: #1e293b;
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
            --card-hover-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.4);
            --glow-shadow: 0 0 20px rgba(99, 102, 241, 0.6);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }

        /* Sidebar styling */
        .sidebar {
            width: 270px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: var(--sidebar-bg);
            color: var(--sidebar-text);
            padding: 30px 20px;
            z-index: 1000;
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
        }

        .brand {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: var(--text-color);
            margin-bottom: 35px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .brand-icon {
            background: var(--primary-gradient);
            color: white;
            padding: 5px 12px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.3);
        }

        .menu-section {
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 700;
            color: #64748b;
            letter-spacing: 1px;
            margin: 20px 0 8px 12px;
        }

        /* Smooth Page Entry Animation */
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

        /* Pulse Animation for Warning Statuses */
        @keyframes statusPulse {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.4); }
            70% { transform: scale(1.02); box-shadow: 0 0 0 8px rgba(245, 158, 11, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(245, 158, 11, 0); }
        }
        .status-pulse {
            animation: statusPulse 2s infinite ease-in-out;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--sidebar-text);
            text-decoration: none;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 14px;
            transition: var(--transition-fluid);
        }

        .sidebar a:hover {
            background: var(--sidebar-hover);
            color: var(--primary-color);
            transform: translateX(5px);
        }

        .sidebar a.active-menu {
            background: var(--primary-light) !important;
            color: var(--primary-color) !important;
            font-weight: 700;
        }

        /* Content Container */
        .content {
            margin-left: 270px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Topbar styling */
        .topbar {
            background: var(--topbar-bg);
            padding: 20px 40px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 99;
        }

        .main-content {
            padding: 40px;
            flex: 1;
        }

        /* Cards and Elements */
        .card {
            border: 1px solid var(--border-color);
            border-radius: 20px;
            background: var(--card-bg);
            box-shadow: var(--card-shadow);
            transition: var(--transition-fluid);
            overflow: hidden;
            color: var(--text-color) !important;
        }
        
        .card-body {
            color: var(--text-color) !important;
        }

        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--card-hover-shadow);
        }

        /* Stats Cards Layout */
        .stat-card-custom {
            position: relative;
            padding: 24px;
            border-left: 6px solid transparent;
            background: var(--card-bg);
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            transition: var(--transition-fluid);
            border: 1px solid var(--border-color);
        }
        
        .stat-card-custom:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 30px -10px rgba(37, 99, 235, 0.15);
            border-color: rgba(37, 99, 235, 0.2);
        }

        .stat-card-primary { border-left-color: var(--primary-color); }
        .stat-card-success { border-left-color: #10b981; }
        .stat-card-warning { border-left-color: #f59e0b; }
        .stat-card-danger { border-left-color: #ef4444; }
        .stat-card-info { border-left-color: #0ea5e9; }
        .stat-card-purple { border-left-color: #8b5cf6; }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .bg-light-primary { background-color: var(--primary-light); color: var(--primary-color); }
        .bg-light-success { background-color: rgba(16, 185, 129, 0.15); color: #10b981; }
        .bg-light-warning { background-color: rgba(245, 158, 11, 0.15); color: #f59e0b; }
        .bg-light-danger { background-color: rgba(239, 68, 68, 0.15); color: #ef4444; }
        .bg-light-info { background-color: rgba(14, 165, 233, 0.15); color: #0ea5e9; }
        .bg-light-purple { background-color: rgba(168, 85, 247, 0.15); color: #a855f7; }

        /* Tables styling */
        .table-custom-wrapper {
            background: var(--card-bg);
            border-radius: 16px;
            border: 1px solid var(--border-color);
            overflow-x: auto;
            overflow-y: hidden;
        }

        .table-custom {
            margin-bottom: 0;
            color: var(--text-color);
            --bs-table-bg: transparent;
            --bs-table-color: var(--text-color);
            --bs-table-hover-bg: var(--sidebar-hover);
            --bs-table-hover-color: var(--text-color);
            --bs-table-striped-bg: transparent;
            --bs-table-active-bg: var(--sidebar-hover);
        }

        .table-custom th {
            background-color: var(--sidebar-hover);
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
            padding: 16px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .table-custom td {
            padding: 18px 24px;
            vertical-align: middle;
            color: var(--text-color);
            border-bottom: 1px solid var(--border-color);
        }

        .table-custom tr:last-child td {
            border-bottom: none;
        }

        .table-custom tr {
            transition: background-color 0.2s;
        }

        .table-custom tr:hover {
            background-color: var(--sidebar-hover);
        }

        /* Utility Overrides for Dark Mode */
        .text-muted { color: var(--text-muted) !important; }
        .text-secondary { color: var(--text-muted) !important; }
        .bg-white { background-color: var(--card-bg) !important; }
        .text-dark { color: var(--text-color) !important; }

        /* Buttons Styling */
        .btn {
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 12px;
            transition: var(--transition-fluid);
        }

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            box-shadow: 0 6px 15px rgba(37, 99, 235, 0.25);
            color: white;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, transparent 100%);
            opacity: 0;
            transition: var(--transition-fluid);
            z-index: -1;
        }

        .btn-primary:hover {
            transform: translateY(-4px) scale(1.03);
            box-shadow: var(--glow-shadow);
            color: white;
        }
        .btn-primary:hover::after {
            opacity: 1;
        }

        .btn-success {
            background: var(--success-gradient);
            border: none;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
            color: white;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.35);
            background: var(--success-gradient);
            color: white;
        }

        .btn-danger {
            background: var(--danger-gradient);
            border: none;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
            color: white;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.35);
            background: var(--danger-gradient);
            color: white;
        }

        .btn-warning {
            background: var(--warning-gradient);
            color: white;
            border: none;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2);
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.35);
            color: white;
        }

        .btn-secondary {
            background-color: #f1f5f9;
            color: #475569;
            border: 1px solid #e2e8f0;
        }

        .btn-secondary:hover {
            background-color: #e2e8f0;
            color: #1e293b;
        }

        /* Badge design */
        .badge-pill-custom {
            padding: 6px 14px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* Statuses */
        .status-pending { background-color: #fef3c7; color: #d97706; }
        .status-approved { background-color: #d1fae5; color: #059669; }
        .status-rejected { background-color: #fee2e2; color: #dc2626; }
        .status-refunded { background-color: #e0f2fe; color: #0284c7; }
        .status-used { background-color: #f3e8ff; color: #7e22ce; }
        .status-unused { background-color: #d1fae5; color: #059669; }

        /* Form Inputs */
        .form-control, .form-select {
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 14px;
            transition: all var(--transition-speed);
            color: var(--text-color) !important;
            background-color: var(--card-bg) !important;
        }

        .form-control::placeholder {
            color: var(--text-muted) !important;
            opacity: 0.8;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px var(--primary-light);
            outline: none;
        }

        .form-label {
            font-weight: 600;
            font-size: 13px;
            color: var(--text-color);
            margin-bottom: 8px;
        }

        /* Logout button */
        .logout-btn-custom {
            border: 1px solid rgba(239, 68, 68, 0.2);
            background: transparent;
            color: #ef4444;
            padding: 8px 16px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.2s;
        }

        .logout-btn-custom:hover {
            background: #ef4444;
            color: white;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.15);
        }

        /* Empty state design */
        .empty-state {
            padding: 50px 30px;
            text-align: center;
        }

        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 20px;
            opacity: 0.7;
        }

        /* Guest layout */
        .guest-container {
            max-width: 480px;
            margin: 80px auto;
        }

        /* Hero Banner styling */
        .hero-banner-custom {
            background: var(--primary-gradient);
            color: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.2);
            position: relative;
            overflow: hidden;
            margin-bottom: 35px;
        }

        .hero-banner-custom::before {
            content: '';
            position: absolute;
            width: 250px;
            height: 250px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            top: -100px;
            right: -50px;
        }

        .hero-title-custom {
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .hero-subtitle-custom {
            font-size: 15px;
            opacity: 0.9;
            margin-bottom: 0;
            font-weight: 400;
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
    </style>
</head>
<body>

@auth
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="brand">
            <span class="brand-icon"><i class="ph-bold ph-ticket"></i></span> <span>E-Ticket Plus</span>
        </div>

        <div class="menu-section">Administrator</div>
        
        <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active-menu' : '' }}">
            <span class="fs-5"><i class="ph-fill ph-chart-bar"></i></span> Dashboard Admin
        </a>

        <a href="/events" class="{{ request()->is('events') || request()->is('events/*/edit') || request()->is('events/create') ? 'active-menu' : '' }}">
            <span class="fs-5"><i class="ph-fill ph-ticket"></i></span> Kelola Event
        </a>
        
        <a href="/tickets" class="{{ request()->is('tickets') && !request()->is('tickets/*') ? 'active-menu' : '' }}">
            <span class="fs-5"><i class="ph-fill ph-file-text"></i></span> Semua Pembelian
        </a>
        
        <a href="/refunds" class="{{ request()->is('refunds') ? 'active-menu' : '' }}">
            <span class="fs-5"><i class="ph-fill ph-money"></i></span> Kelola Refund
        </a>
        
        <a href="/check-ticket" class="{{ request()->is('check-ticket') ? 'active-menu' : '' }}">
            <span class="fs-5"><i class="ph-fill ph-check-circle"></i></span> Validasi Tiket
        </a>

        <div class="menu-section mt-auto">Portal Utama</div>
        <a href="/">
            <span class="fs-5"><i class="ph-fill ph-house"></i></span> Halaman Utama
        </a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Topbar -->
        <div class="topbar">
            <div>
                <h5 class="mb-0 fw-bold">Selamat Datang, {{ Auth::user()->name }}! <i class="ph-fill ph-hand-waving text-warning"></i></h5>
                <small class="text-muted">Kelola pemesanan, validation dan monitoring tiket dengan mudah.</small>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm btn-outline-secondary border-0 d-flex align-items-center justify-content-center" id="theme-toggle" style="width: 36px; height: 36px; border-radius: 50%;">
                    <i class="ph-bold ph-moon fs-5" id="theme-icon"></i>
                </button>
                <span class="fw-semibold text-secondary">
                    <i class="ph-fill ph-user"></i> Portal {{ auth()->user()->role === 'admin' ? 'Administrator' : 'Customer' }}
                </span>
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn-custom">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main content area -->
        <div class="main-content">
            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-custom alert-success-custom alert-dismissible fade show mb-4 shadow-sm" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="ph-fill ph-sparkle fs-5"></i>
                        <div><strong>Berhasil!</strong> {{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-custom alert-danger-custom alert-dismissible fade show mb-4 shadow-sm" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="ph-fill ph-warning fs-5"></i>
                        <div><strong>Error!</strong> {{ session('error') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="animate-fade-in-up">
                @yield('content')
            </div>
        </div>
    </div>
@else
    <!-- Guest Layout -->
    <div class="container guest-container">
        @yield('content')
    </div>
@endauth

<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Theme Toggle Script -->
<script>
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');
    
    // Cek preferensi tema sebelumnya
    const currentTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', currentTheme);
    if(themeIcon) updateIcon(currentTheme);

    if(themeToggleBtn) {
        themeToggleBtn.addEventListener('click', () => {
            let theme = document.documentElement.getAttribute('data-theme');
            let newTheme = theme === 'dark' ? 'light' : 'dark';
            
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateIcon(newTheme);
        });
    }

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
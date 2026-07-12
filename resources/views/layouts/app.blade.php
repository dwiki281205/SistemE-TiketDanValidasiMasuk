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

    <!-- Custom Premium Stylesheet -->
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            --secondary-gradient: linear-gradient(135deg, #ec4899 0%, #d946ef 100%);
            --info-gradient: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%);
            --success-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            --danger-gradient: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            
            --bg-color: #f8fafc;
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.04), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
            --card-hover-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-color);
            color: #1e293b;
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
            color: #f1f5f9;
            padding: 30px 20px;
            z-index: 1000;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-direction: column;
        }

        .brand {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #ffffff;
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
            box-shadow: 0 4px 10px rgba(99, 102, 241, 0.3);
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
            color: #94a3b8;
            text-decoration: none;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 6px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .sidebar a:hover {
            background: var(--sidebar-hover);
            color: #ffffff;
            transform: translateX(8px) scale(1.02);
        }

        .sidebar a.active-menu {
            background: var(--primary-gradient) !important;
            color: #ffffff !important;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
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
            background: #ffffff;
            padding: 20px 40px;
            border-bottom: 1px solid #e2e8f0;
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
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 20px;
            background: #ffffff;
            box-shadow: var(--card-shadow);
            transition: all var(--transition-speed);
            overflow: hidden;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-hover-shadow);
        }

        /* Stats Cards Layout */
        .stat-card-custom {
            position: relative;
            padding: 24px;
            border-left: 6px solid transparent;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }
        
        .stat-card-custom:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 30px -10px rgba(99, 102, 241, 0.15);
            border-color: rgba(99, 102, 241, 0.2);
        }

        .stat-card-primary { border-left-color: #6366f1; }
        .stat-card-success { border-left-color: #10b981; }
        .stat-card-warning { border-left-color: #f59e0b; }
        .stat-card-danger { border-left-color: #ef4444; }
        .stat-card-info { border-left-color: #0ea5e9; }
        .stat-card-purple { border-left-color: #a855f7; }

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

        .bg-light-primary { background-color: rgba(99, 102, 241, 0.1); color: #6366f1; }
        .bg-light-success { background-color: rgba(16, 185, 129, 0.1); color: #10b981; }
        .bg-light-warning { background-color: rgba(245, 158, 11, 0.1); color: #f59e0b; }
        .bg-light-danger { background-color: rgba(239, 68, 68, 0.1); color: #ef4444; }
        .bg-light-info { background-color: rgba(14, 165, 233, 0.1); color: #0ea5e9; }
        .bg-light-purple { background-color: rgba(168, 85, 247, 0.1); color: #a855f7; }

        /* Tables styling */
        .table-custom-wrapper {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid rgba(226, 232, 240, 0.8);
            overflow: hidden;
        }

        .table-custom {
            margin-bottom: 0;
        }

        .table-custom th {
            background-color: #f8fafc;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
            padding: 16px 24px;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-custom td {
            padding: 18px 24px;
            vertical-align: middle;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-custom tr:last-child td {
            border-bottom: none;
        }

        .table-custom tr {
            transition: background-color 0.2s;
        }

        .table-custom tr:hover {
            background-color: #f8fafc;
        }

        /* Buttons Styling */
        .btn {
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 12px;
            transition: all var(--transition-speed);
        }

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.35);
            background: var(--primary-gradient);
            color: white;
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
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 14px;
            transition: all var(--transition-speed);
            color: #334155;
            background-color: #ffffff;
        }

        .form-control:focus, .form-select:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            outline: none;
        }

        .form-label {
            font-weight: 600;
            font-size: 13px;
            color: #475569;
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
    </style>
</head>
<body>

@auth
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="brand">
            <span class="brand-icon">🎫</span> <span>E-Ticket Plus</span>
        </div>

        <div class="menu-section">Administrator</div>
        
        <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active-menu' : '' }}">
            <span>📊</span> Dashboard Admin
        </a>

        <a href="/events" class="{{ request()->is('events') || request()->is('events/*/edit') || request()->is('events/create') ? 'active-menu' : '' }}">
            <span>🎟</span> Kelola Event
        </a>
        
        <a href="/tickets" class="{{ request()->is('tickets') && !request()->is('tickets/*') ? 'active-menu' : '' }}">
            <span>📄</span> Semua Pembelian
        </a>
        
        <a href="/refunds" class="{{ request()->is('refunds') ? 'active-menu' : '' }}">
            <span>💰</span> Kelola Refund
        </a>
        
        <a href="/check-ticket" class="{{ request()->is('check-ticket') ? 'active-menu' : '' }}">
            <span>✅</span> Validasi Tiket
        </a>

        <div class="menu-section mt-auto">Portal Utama</div>
        <a href="/" class="text-white-50">
            <span>🏠</span> Halaman Utama
        </a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Topbar -->
        <div class="topbar">
            <div>
                <h5 class="mb-0 fw-bold">Selamat Datang, {{ Auth::user()->name }}! 👋</h5>
                <small class="text-muted">Kelola pemesanan, validation dan monitoring tiket dengan mudah.</small>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <span class="fw-semibold text-secondary">
                    👤 Portal {{ auth()->user()->role === 'admin' ? 'Administrator' : 'Customer' }}
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
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 16px; background-color: #d1fae5; color: #065f46;">
                    <div class="d-flex align-items-center gap-2">
                        <span>✨</span>
                        <div><strong>Berhasil!</strong> {{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 16px; background-color: #fee2e2; color: #991b1b;">
                    <div class="d-flex align-items-center gap-2">
                        <span>⚠️</span>
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
</body>
</html>
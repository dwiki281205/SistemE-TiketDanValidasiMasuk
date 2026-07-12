<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket Plus - Portal</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #312e81 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #f1f5f9;
            margin: 0;
        }

        .auth-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            width: 100%;
            max-width: 450px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .auth-brand {
            font-size: 26px;
            font-weight: 800;
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .auth-brand span {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-control {
            background: rgba(15, 23, 42, 0.6) !important;
            border: 1.5px solid rgba(255, 255, 255, 0.1) !important;
            color: #ffffff !important;
            border-radius: 12px;
            padding: 12px 16px;
            transition: all 0.3s;
        }

        .form-control:focus {
            background: rgba(15, 23, 42, 0.8) !important;
            border-color: #6366f1 !important;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.25) !important;
            color: #ffffff !important;
        }

        .form-label {
            font-weight: 600;
            font-size: 13px;
            color: #94a3b8;
            margin-bottom: 8px;
        }

        .btn-auth {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            border: none;
            color: white;
            padding: 14px;
            font-weight: 700;
            font-size: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
            transition: all 0.3s;
            width: 100%;
        }

        .btn-auth:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.45);
            color: white;
        }

        .auth-links a {
            color: #e2e8f0;
            text-decoration: none;
            font-size: 13.5px;
            transition: color 0.2s;
        }

        .auth-links a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        .invalid-feedback {
            color: #f87171;
            font-size: 12px;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="auth-card">
        <div class="auth-brand">
            🎫 <span>E-Ticket Plus</span>
        </div>

        {{ $slot }}
    </div>

</body>
</html>

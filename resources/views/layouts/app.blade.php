<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Temukan tempat kuliner terbaik di sekitar Anda. Rekomendasi restoran, kafe, dan warung makan pilihan.">
    <title>@yield('title', 'Tempat Kuliner')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
            --secondary: #f59e0b;
            --accent: #10b981;
            --dark: #0f172a;
            --dark-card: #1e293b;
            --surface: #f1f5f9;
            --text-primary: #0f172a;
            --text-secondary: #64748b;
            --gradient-1: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #a78bfa 100%);
            --gradient-2: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 30px rgba(0,0,0,0.12);
            --shadow-xl: 0 20px 50px rgba(0,0,0,0.15);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
        }
        * { box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--surface);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
        }
        .navbar-custom {
            background: var(--gradient-2);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.06);
            padding: 0.8rem 0;
            transition: all 0.3s ease;
        }
        .navbar-custom.scrolled {
            padding: 0.5rem 0;
            box-shadow: var(--shadow-lg);
        }
        .navbar-custom .navbar-brand {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 1.5rem;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }
        .navbar-custom .navbar-brand i {
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-right: 6px;
        }
        .navbar-custom .nav-link {
            color: rgba(255,255,255,0.7) !important;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.5rem 1rem !important;
            border-radius: var(--radius-sm);
            transition: all 0.3s ease;
        }
        .navbar-custom .nav-link:hover {
            color: #fff !important;
            background: rgba(255,255,255,0.08);
        }
        .navbar-custom .btn-nav-login {
            background: var(--gradient-1);
            color: #fff !important;
            border: none;
            padding: 0.5rem 1.4rem !important;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .navbar-custom .btn-nav-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(99,102,241,0.4);
        }
        .btn-nav-logout {
            color: rgba(255,255,255,0.7) !important;
            background: none;
            border: 1px solid rgba(255,255,255,0.15) !important;
            padding: 0.45rem 1.2rem !important;
            font-weight: 500;
            font-size: 0.9rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .btn-nav-logout:hover {
            color: #fff !important;
            border-color: rgba(255,255,255,0.3) !important;
            background: rgba(255,255,255,0.06);
        }
        .alert-custom-success {
            background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(16,185,129,0.05));
            border: 1px solid rgba(16,185,129,0.2);
            color: #065f46;
            border-radius: var(--radius-md);
            padding: 1rem 1.5rem;
            font-weight: 500;
        }
        .alert-custom-danger {
            background: linear-gradient(135deg, rgba(239,68,68,0.1), rgba(239,68,68,0.05));
            border: 1px solid rgba(239,68,68,0.2);
            color: #991b1b;
            border-radius: var(--radius-md);
            padding: 1rem 1.5rem;
            font-weight: 500;
        }
        .card-premium {
            background: #fff;
            border: 1px solid rgba(0,0,0,0.04);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }
        .card-premium:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-xl);
            border-color: rgba(99,102,241,0.15);
        }
        .card-premium .card-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 220px;
        }
        .card-premium .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-premium:hover .card-img-wrapper img {
            transform: scale(1.08);
        }
        .card-premium .card-img-overlay-gradient {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50%;
            background: linear-gradient(to top, rgba(0,0,0,0.5), transparent);
            pointer-events: none;
        }
        .card-premium .card-body {
            padding: 1.4rem;
        }
        .badge-food {
            display: inline-block;
            background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1));
            color: var(--primary);
            font-weight: 600;
            font-size: 0.72rem;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            border: 1px solid rgba(99,102,241,0.15);
            margin-right: 0.3rem;
            margin-bottom: 0.3rem;
            letter-spacing: 0.02em;
        }
        .btn-primary-gradient {
            background: var(--gradient-1);
            color: #fff;
            border: none;
            padding: 0.6rem 1.6rem;
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(99,102,241,0.3);
        }
        .btn-primary-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99,102,241,0.4);
            color: #fff;
        }
        .btn-outline-premium {
            color: var(--primary);
            border: 2px solid var(--primary);
            background: transparent;
            padding: 0.55rem 1.4rem;
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .btn-outline-premium:hover {
            background: var(--primary);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(99,102,241,0.3);
        }
        .footer-custom {
            background: var(--gradient-2);
            color: rgba(255,255,255,0.6);
            padding: 2rem 0;
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.06);
            font-size: 0.85rem;
        }
        .footer-custom a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: color 0.3s;
        }
        .footer-custom a:hover { color: var(--primary-light); }
        .footer-custom .footer-brand {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            font-size: 1.2rem;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-in {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }
        .animate-delay-1 { animation-delay: 0.1s; }
        .animate-delay-2 { animation-delay: 0.2s; }
        .animate-delay-3 { animation-delay: 0.3s; }
        .animate-delay-4 { animation-delay: 0.4s; }
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 50px;
            padding: 0.5rem 1rem;
            border: 2px solid #e2e8f0;
            transition: border-color 0.3s;
        }
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
            outline: none;
        }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--surface); }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        .table-premium {
            border-collapse: separate;
            border-spacing: 0;
        }
        .table-premium thead th {
            background: var(--dark);
            color: #fff;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 1rem;
            border: none;
        }
        .table-premium thead th:first-child { border-radius: var(--radius-md) 0 0 0; }
        .table-premium thead th:last-child { border-radius: 0 var(--radius-md) 0 0; }
        .table-premium tbody td {
            padding: 0.9rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.9rem;
        }
        .table-premium tbody tr {
            transition: background 0.2s;
        }
        .table-premium tbody tr:hover {
            background: rgba(99,102,241,0.03);
        }
        .form-control-premium {
            border: 2px solid #e2e8f0;
            border-radius: var(--radius-md);
            padding: 0.7rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        .form-control-premium:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99,102,241,0.1);
        }
        .form-label-premium {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            letter-spacing: 0.02em;
        }
        .no-image-placeholder {
            background: linear-gradient(135deg, #e2e8f0, #cbd5e1);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: #94a3b8;
            font-size: 2rem;
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-utensils"></i> KulinerKu
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fas fa-bars" style="color: rgba(255,255,255,0.8);"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home me-1"></i> Beranda</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.tempat-kuliner.index') }}"><i class="fas fa-cog me-1"></i> Admin Panel</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-nav-logout">
                                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-nav-login" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <main class="flex-grow-1">
        <div class="container py-4">
            @if(session('success'))
                <div class="alert alert-custom-success d-flex align-items-center animate-in" role="alert">
                    <i class="fas fa-check-circle me-2 fs-5"></i> {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-custom-danger d-flex align-items-center animate-in" role="alert">
                    <i class="fas fa-exclamation-circle me-2 fs-5"></i> {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </div>
    </main>
    <footer class="footer-custom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <span class="footer-brand"><i class="fas fa-utensils me-1"></i> KulinerKu</span>
                    <p class="mb-0 mt-1">Temukan pengalaman kuliner terbaik di sekitar Anda.</p>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <p class="mb-0">&copy; {{ date('Y') }} KulinerKu &mdash; Dibuat oleh Risyad Ramadhan - 241011750007</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>

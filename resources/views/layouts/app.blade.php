<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Faskes Unicare - Healthcare Management System">
    <meta name="theme-color" content="#215E61">

    <title>{{ config('app.name', 'Faskes Unicare') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🏥</text></svg>">

    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">

    <style>
        :root {
            --bg-main: #f8f9fa;
            --bg-cream: #F5FBE6;
            --primary: #FE7F2D;
            --primary-light: #fff0e6;
            --secondary: #215E61;
            --dark: #233D4D;
            --text: #1a1a2e;
            --text-light: #6b7280;
            --white: #ffffff;
            --border: #e5e7eb;
            --shadow: 0 2px 8px rgba(0,0,0,0.08);
            --radius: 16px;
            --radius-sm: 10px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: var(--bg-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .app-navbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0.75rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .app-navbar .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: var(--dark);
        }

        .navbar-brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), #e56c20);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            transition: transform 0.2s ease;
        }

        .navbar-brand:hover .navbar-brand-icon {
            transform: rotate(-5deg) scale(1.05);
        }

        .navbar-brand-text {
            font-weight: 700;
            font-size: 1.1rem;
        }

        .navbar-brand-text span {
            color: var(--primary);
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.6rem 1.25rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.875rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-light {
            background: var(--bg-main);
            color: var(--dark);
        }

        .btn-light:hover {
            background: var(--bg-cream);
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #e56c20;
            transform: translateY(-1px);
        }

        .btn-sm {
            padding: 0.4rem 0.75rem;
            font-size: 0.8rem;
        }

        /* User Card */
        .user-card {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.4rem 1rem 0.4rem 0.4rem;
            background: var(--bg-main);
            border-radius: 50px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--secondary), #1a4a4d);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--dark);
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        /* Main Content */
        .app-main {
            flex: 1;
            padding: 2rem 0;
        }

        .app-main .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Footer */
        .app-footer {
            background: var(--white);
            border-top: 1px solid var(--border);
            padding: 1rem 0;
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .app-footer .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .app-footer a {
            color: var(--primary);
            text-decoration: none;
        }

        .app-footer a:hover {
            text-decoration: underline;
        }

        .version-badge {
            background: var(--bg-cream);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--secondary);
        }

        @media (max-width: 768px) {
            .user-name {
                display: none;
            }

            .app-footer .container {
                flex-direction: column;
                gap: 0.5rem;
                text-align: center;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="app-navbar">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="navbar-brand-icon">🏥</div>
                <div class="navbar-brand-text">Faskes<span>Unicare</span></div>
            </a>

            <!-- Actions -->
            <div class="navbar-actions">
                @guest
                    @if (Route::has('login'))
                        <a class="btn btn-light btn-sm" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i>
                            Login
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a class="btn btn-primary btn-sm" href="{{ route('register') }}">
                            <i class="fas fa-user-plus"></i>
                            Register
                        </a>
                    @endif
                @else
                    <div class="user-card">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <span class="user-name">{{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="app-main">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="app-footer">
        <div class="container">
            <div>
                Built with 💖 by <a href="https://twitter.com/@oggiesutrisna" target="_blank" rel="noopener">Oggie Sutrisna</a>
            </div>
            <div style="display: flex; align-items: center; gap: 1rem;">
                <span class="version-badge">v1.0.0</span>
                <span>&copy; {{ date('Y') }} Faskes Unicare</span>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>

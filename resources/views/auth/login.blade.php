<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Faskes Unicare</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">
    <style>
        /* ========================================
           NEUBRUTALISM DESIGN SYSTEM
           Color Palette:
           - YinMn Blue: #2E4C8C
           - Old Lace: #FFF3E1
           - Red: #FA2D1A
           - Black: #1a1a1a
           ======================================== */
        
        :root {
            --blue: #2E4C8C;
            --cream: #FFF3E1;
            --red: #FA2D1A;
            --black: #1a1a1a;
            --white: #ffffff;
            --gray: #666666;
            --light-gray: #f5f5f5;
            --shadow-offset: 6px;
            --border-width: 3px;
            --radius: 16px;
            --danger: #dc3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--cream);
            position: relative;
            overflow-x: hidden;
        }

        /* Background Pattern */
        .bg-pattern {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 10% 90%, rgba(250, 45, 26, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 90% 10%, rgba(46, 76, 140, 0.08) 0%, transparent 40%);
            z-index: 0;
        }

        /* Decorative Shapes */
        .shape {
            position: fixed;
            border: var(--border-width) solid var(--black);
            z-index: 0;
        }

        .shape-1 {
            width: 100px;
            height: 100px;
            background: var(--blue);
            border-radius: 50%;
            top: 8%;
            right: 10%;
            animation: float 6s ease-in-out infinite;
        }

        .shape-2 {
            width: 70px;
            height: 70px;
            background: var(--red);
            border-radius: var(--radius);
            bottom: 12%;
            left: 8%;
            animation: float 5s ease-in-out infinite reverse;
        }

        .shape-3 {
            width: 50px;
            height: 50px;
            background: var(--cream);
            bottom: 30%;
            right: 5%;
            transform: rotate(45deg);
            animation: spin 12s linear infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        @keyframes spin {
            from { transform: rotate(45deg); }
            to { transform: rotate(405deg); }
        }

        /* Main Container */
        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
            padding: 1.5rem;
        }

        /* Error Alert */
        .neo-alert {
            background: var(--white);
            border: var(--border-width) solid var(--black);
            border-left: 6px solid var(--danger);
            border-radius: var(--radius);
            padding: 1rem 1.25rem;
            margin-bottom: 1.25rem;
            box-shadow: 4px 4px 0 var(--black);
        }

        .neo-alert p {
            margin: 0;
            color: var(--danger);
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Login Card */
        .neo-card {
            background: var(--white);
            border: var(--border-width) solid var(--black);
            border-radius: var(--radius);
            box-shadow: var(--shadow-offset) var(--shadow-offset) 0 var(--black);
            overflow: hidden;
        }

        /* Card Header */
        .card-header {
            background: var(--blue);
            border-bottom: var(--border-width) solid var(--black);
            padding: 1.75rem 2rem;
            text-align: center;
        }

        .card-header a {
            text-decoration: none;
            color: var(--white);
            font-size: 1.75rem;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .card-header a span {
            font-weight: 400;
            opacity: 0.9;
        }

        /* Card Body */
        .card-body {
            padding: 2rem;
        }

        .login-message {
            text-align: center;
            font-size: 1rem;
            color: var(--gray);
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: stretch;
        }

        .neo-input {
            flex: 1;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1rem;
            padding: 0.9rem 1rem;
            border: var(--border-width) solid var(--black);
            border-right: none;
            border-radius: 10px 0 0 10px;
            background: var(--white);
            color: var(--black);
            transition: all 0.2s ease;
        }

        .neo-input:focus {
            outline: none;
            background: var(--cream);
        }

        .neo-input::placeholder {
            color: #aaa;
        }

        .neo-input.is-invalid {
            border-color: var(--danger);
            background: #fff5f5;
        }

        .input-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            background: var(--cream);
            border: var(--border-width) solid var(--black);
            border-radius: 0 10px 10px 0;
            color: var(--black);
        }

        /* Checkbox */
        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .neo-checkbox {
            width: 22px;
            height: 22px;
            border: 2px solid var(--black);
            border-radius: 6px;
            background: var(--white);
            cursor: pointer;
            position: relative;
            appearance: none;
            -webkit-appearance: none;
            transition: all 0.2s ease;
        }

        .neo-checkbox:checked {
            background: var(--blue);
        }

        .neo-checkbox:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--white);
            font-size: 14px;
            font-weight: 700;
        }

        .checkbox-label {
            font-size: 0.9rem;
            color: var(--black);
            cursor: pointer;
            font-weight: 500;
        }

        /* Submit Button */
        .btn-neo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            width: 100%;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            padding: 1rem 2rem;
            border: var(--border-width) solid var(--black);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.15s ease;
            background: var(--red);
            color: var(--white);
            box-shadow: 4px 4px 0 var(--black);
        }

        .btn-neo:hover {
            background: #e02615;
            box-shadow: 6px 6px 0 var(--black);
            transform: translate(-2px, -2px);
        }

        .btn-neo:active {
            box-shadow: 2px 2px 0 var(--black);
            transform: translate(2px, 2px);
        }

        /* Back Link */
        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: var(--gray);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: var(--blue);
        }

        .back-link i {
            margin-right: 0.5rem;
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: #999;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 2px;
            background: var(--black);
            opacity: 0.1;
        }

        .divider span {
            padding: 0 1rem;
        }

        /* Social/Info Tags */
        .info-tags {
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .info-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: var(--cream);
            border: 2px solid var(--black);
            border-radius: 8px;
            padding: 0.4rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--black);
        }

        .info-tag i {
            color: var(--blue);
        }

        /* ========================================
           RESPONSIVE DESIGN
           ======================================== */

        /* Tablets */
        @media (min-width: 768px) and (max-width: 991px) {
            .login-container {
                max-width: 420px;
            }

            .shape-1 { width: 80px; height: 80px; }
            .shape-2 { width: 55px; height: 55px; }
        }

        /* Mobile phones */
        @media (max-width: 767px) {
            .login-container {
                padding: 1rem;
                max-width: 100%;
            }

            .neo-card {
                border-radius: 14px;
            }

            .card-header {
                padding: 1.5rem;
            }

            .card-header a {
                font-size: 1.5rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            .neo-input {
                padding: 0.8rem 0.9rem;
                font-size: 0.95rem;
            }

            .input-icon {
                width: 45px;
            }

            .btn-neo {
                padding: 0.9rem 1.5rem;
            }

            /* Shapes */
            .shape-3 { display: none; }

            .shape-1 {
                width: 50px;
                height: 50px;
                top: 3%;
                right: 5%;
            }

            .shape-2 {
                width: 40px;
                height: 40px;
                bottom: 5%;
                left: 5%;
            }
        }

        /* Extra small phones */
        @media (max-width: 375px) {
            .card-header {
                padding: 1.25rem;
            }

            .card-header a {
                font-size: 1.35rem;
            }

            .card-body {
                padding: 1.25rem;
            }

            .login-message {
                font-size: 0.9rem;
            }

            .neo-input {
                padding: 0.75rem 0.8rem;
                font-size: 0.9rem;
            }

            .checkbox-label {
                font-size: 0.85rem;
            }

            .btn-neo {
                font-size: 0.95rem;
            }

            .info-tag {
                font-size: 0.7rem;
                padding: 0.35rem 0.6rem;
            }
        }

        /* Landscape mode */
        @media (max-height: 600px) and (orientation: landscape) {
            body {
                padding: 1rem 0;
                overflow-y: auto;
                align-items: flex-start;
            }

            .login-container {
                margin: 1rem auto;
            }

            .card-header {
                padding: 1rem 1.5rem;
            }

            .card-body {
                padding: 1.25rem 1.5rem;
            }

            .form-group {
                margin-bottom: 1rem;
            }

            .checkbox-wrapper {
                margin-bottom: 1rem;
            }

            .shape { display: none; }
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .shape-1,
            .shape-2,
            .shape-3 {
                animation: none;
            }

            .btn-neo:hover {
                transform: none;
            }
        }
    </style>
</head>
<body>
    <!-- Background Pattern -->
    <div class="bg-pattern"></div>

    <!-- Decorative Shapes -->
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>

    <!-- Login Container -->
    <div class="login-container">
        <!-- Error Messages -->
        @if ($errors->any())
            <div class="neo-alert">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Login Card -->
        <div class="neo-card">
            <!-- Header -->
            <div class="card-header">
                <a href="{{ route('home') }}">
                    <strong>FASKES</strong><span>Unicare</span>
                </a>
            </div>

            <!-- Body -->
            <div class="card-body">
                <p class="login-message">Sign in to your account</p>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    <!-- Username -->
                    <div class="form-group">
                        <div class="input-wrapper">
                            <input 
                                type="text" 
                                class="neo-input @error('username') is-invalid @enderror" 
                                name="username" 
                                id="username" 
                                value="{{ old('username') }}" 
                                required
                                placeholder="Username" 
                                autocomplete="username" 
                                autofocus
                            >
                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <div class="input-wrapper">
                            <input 
                                id="password" 
                                type="password" 
                                name="password" 
                                class="neo-input @error('password') is-invalid @enderror"
                                placeholder="Password" 
                                required
                            >
                            <div class="input-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="remember" name="remember" class="neo-checkbox">
                        <label for="remember" class="checkbox-label">Remember Me</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-neo">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Sign In</span>
                    </button>
                </form>

                <!-- Divider -->
                <div class="divider">
                    <span>secure login</span>
                </div>

                <!-- Info Tags -->
                <div class="info-tags">
                    <div class="info-tag">
                        <i class="fas fa-shield-alt"></i>
                        <span>SSL Secured</span>
                    </div>
                    <div class="info-tag">
                        <i class="fas fa-lock"></i>
                        <span>Encrypted</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Link -->
        <a href="{{ route('home') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Back to Home
        </a>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
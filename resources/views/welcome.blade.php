<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Faskes Unicare - Your Trusted Healthcare Partner" />
    <meta name="author" content="Oggie Sutrisna" />
    <title>Faskes Unicare - Welcome</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome icons -->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <style>
        /* ========================================
           NEUBRUTALISM DESIGN SYSTEM
           Color Palette:
           - Light Green: #F5FBE6
           - Teal: #215E61
           - Dark Navy: #233D4D
           - Orange: #FE7F2D
           ======================================== */
        
        :root {
            --blue: #215E61;
            --cream: #F5FBE6;
            --red: #FE7F2D;
            --black: #233D4D;
            --white: #ffffff;
            --shadow-offset: 6px;
            --border-width: 3px;
            --radius: 16px;
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
                radial-gradient(circle at 20% 80%, rgba(254, 127, 45, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(33, 94, 97, 0.1) 0%, transparent 50%);
            z-index: 0;
        }

        /* Decorative Shapes */
        .shape {
            position: fixed;
            border: var(--border-width) solid var(--black);
            z-index: 0;
        }

        .shape-1 {
            width: 120px;
            height: 120px;
            background: var(--red);
            border-radius: 50%;
            top: 10%;
            left: 5%;
            animation: float 6s ease-in-out infinite;
        }

        .shape-2 {
            width: 80px;
            height: 80px;
            background: var(--blue);
            border-radius: var(--radius);
            bottom: 15%;
            right: 8%;
            animation: float 5s ease-in-out infinite reverse;
        }

        .shape-3 {
            width: 60px;
            height: 60px;
            background: var(--cream);
            top: 20%;
            right: 15%;
            transform: rotate(45deg);
            animation: spin 10s linear infinite;
        }

        .shape-4 {
            width: 100px;
            height: 100px;
            background: var(--red);
            border-radius: var(--radius);
            bottom: 20%;
            left: 10%;
            animation: float 7s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @keyframes spin {
            from { transform: rotate(45deg); }
            to { transform: rotate(405deg); }
        }

        /* Main Container */
        .welcome-container {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 2rem;
            max-width: 550px;
            width: 95%;
        }

        /* Neubrutalism Card */
        .neo-card {
            background: var(--white);
            border: var(--border-width) solid var(--black);
            border-radius: var(--radius);
            padding: 3rem 2.5rem;
            box-shadow: var(--shadow-offset) var(--shadow-offset) 0 var(--black);
            transition: all 0.2s ease;
        }

        .neo-card:hover {
            box-shadow: calc(var(--shadow-offset) + 2px) calc(var(--shadow-offset) + 2px) 0 var(--black);
            transform: translate(-2px, -2px);
        }

        /* Logo Icon */
        .logo-container {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 90px;
            height: 90px;
            background: var(--blue);
            border: var(--border-width) solid var(--black);
            border-radius: var(--radius);
            box-shadow: 4px 4px 0 var(--black);
            margin-bottom: 1.5rem;
            color: var(--white);
            font-size: 2.5rem;
        }

        /* Badge */
        .neo-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--cream);
            border: 2px solid var(--black);
            border-radius: 50px;
            padding: 0.5rem 1rem;
            margin-bottom: 1.25rem;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--black);
        }

        .neo-badge i {
            color: var(--red);
        }

        /* Typography */
        .title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--black);
            margin-bottom: 0.5rem;
            letter-spacing: -0.02em;
        }

        .title span {
            color: var(--blue);
        }

        .subtitle {
            font-size: 1rem;
            font-weight: 400;
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        /* Buttons */
        .btn-neo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            padding: 1rem 2rem;
            border: var(--border-width) solid var(--black);
            border-radius: 12px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.15s ease;
        }

        .btn-neo-primary {
            background: var(--red);
            color: var(--white);
            box-shadow: 4px 4px 0 var(--black);
        }

        .btn-neo-primary:hover {
            background: #e56c20;
            box-shadow: 6px 6px 0 var(--black);
            transform: translate(-2px, -2px);
            color: var(--white);
            text-decoration: none;
        }

        .btn-neo-primary:active {
            box-shadow: 2px 2px 0 var(--black);
            transform: translate(2px, 2px);
        }

        .btn-neo-secondary {
            background: var(--white);
            color: var(--black);
            box-shadow: 4px 4px 0 var(--black);
        }

        .btn-neo-secondary:hover {
            background: var(--cream);
            box-shadow: 6px 6px 0 var(--black);
            transform: translate(-2px, -2px);
            color: var(--black);
            text-decoration: none;
        }

        .btn-neo-secondary:active {
            box-shadow: 2px 2px 0 var(--black);
            transform: translate(2px, 2px);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: #999;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 2px;
            background: var(--black);
            opacity: 0.15;
        }

        .divider span {
            padding: 0 1rem;
        }

        /* Features List */
        .features {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .feature-tag {
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

        .feature-tag i {
            color: var(--blue);
        }

        /* ========================================
           RESPONSIVE DESIGN
           ======================================== */

        /* Large screens */
        @media (min-width: 1200px) {
            .welcome-container {
                max-width: 600px;
            }

            .neo-card {
                padding: 3.5rem 3rem;
            }

            .title {
                font-size: 2.75rem;
            }
        }

        /* Tablets */
        @media (min-width: 768px) and (max-width: 991px) {
            .welcome-container {
                max-width: 500px;
            }

            .title {
                font-size: 2.25rem;
            }

            .shape-1 { width: 100px; height: 100px; }
            .shape-2 { width: 60px; height: 60px; }
            .shape-4 { width: 80px; height: 80px; }
        }

        /* Mobile phones */
        @media (max-width: 767px) {
            .welcome-container {
                padding: 1rem;
            }

            .neo-card {
                padding: 2rem 1.5rem;
                border-radius: 14px;
            }

            .logo-container {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }

            .title {
                font-size: 1.875rem;
            }

            .subtitle {
                font-size: 0.9rem;
                margin-bottom: 1.5rem;
            }

            .btn-neo {
                width: 100%;
                padding: 0.9rem 1.5rem;
            }

            .features {
                gap: 0.5rem;
            }

            .feature-tag {
                font-size: 0.7rem;
                padding: 0.35rem 0.6rem;
            }

            /* Hide some shapes on mobile */
            .shape-3,
            .shape-4 {
                display: none;
            }

            .shape-1 {
                width: 60px;
                height: 60px;
                top: 5%;
                left: 3%;
            }

            .shape-2 {
                width: 50px;
                height: 50px;
                bottom: 10%;
                right: 5%;
            }
        }

        /* Extra small phones */
        @media (max-width: 375px) {
            .neo-card {
                padding: 1.5rem 1.25rem;
            }

            .logo-container {
                width: 60px;
                height: 60px;
                font-size: 1.75rem;
            }

            .title {
                font-size: 1.5rem;
            }

            .neo-badge {
                font-size: 0.75rem;
                padding: 0.4rem 0.8rem;
            }

            .btn-neo {
                font-size: 0.9rem;
                gap: 0.5rem;
            }
        }

        /* Landscape mode */
        @media (max-height: 600px) and (orientation: landscape) {
            body {
                padding: 1rem 0;
                overflow-y: auto;
            }

            .neo-card {
                padding: 1.5rem;
            }

            .logo-container {
                width: 60px;
                height: 60px;
                font-size: 1.75rem;
                margin-bottom: 1rem;
            }

            .title {
                font-size: 1.75rem;
            }

            .subtitle {
                margin-bottom: 1rem;
            }

            .features {
                margin-top: 1rem;
            }

            .shape { display: none; }
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .shape-1,
            .shape-2,
            .shape-3,
            .shape-4 {
                animation: none;
            }

            .neo-card:hover,
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
    <div class="shape shape-4"></div>

    <!-- Main Content -->
    <div class="welcome-container">
        <div class="neo-card">
            <!-- Logo -->
            <div class="logo-container">
                <i class="fas fa-heartbeat"></i>
            </div>

            <!-- Badge -->
            <div class="neo-badge">
                <i class="fas fa-star"></i>
                <span>Healthcare Excellence</span>
            </div>

            <!-- Title -->
            <h1 class="title">Faskes <span>Unicare</span></h1>
            <p class="subtitle">
                Your trusted healthcare partner. Experience quality medical services with modern technology and compassionate care.
            </p>

            <!-- Login Button -->
            <a href="{{ route('login') }}" class="btn-neo btn-neo-primary">
                <i class="fas fa-sign-in-alt"></i>
                <span>Login to Dashboard</span>
            </a>

            <!-- Divider -->
            <div class="divider">
                <span>or</span>
            </div>

            <!-- Secondary Button -->
            <a href="{{ route('login') }}" class="btn-neo btn-neo-secondary">
                <i class="fas fa-user-plus"></i>
                <span>Register as Patient</span>
            </a>

            <!-- Features -->
            <div class="features">
                <div class="feature-tag">
                    <i class="fas fa-shield-alt"></i>
                    <span>Secure</span>
                </div>
                <div class="feature-tag">
                    <i class="fas fa-bolt"></i>
                    <span>Fast</span>
                </div>
                <div class="feature-tag">
                    <i class="fas fa-clock"></i>
                    <span>24/7 Support</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

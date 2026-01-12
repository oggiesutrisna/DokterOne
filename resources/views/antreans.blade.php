<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Queue Wizard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ===== CSS Variables ===== */
        :root {
            --font-sans: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --color-grand-corn: #E3DB80;
            --color-denim: #1321BA;
            --color-white: #ffffff;
            --color-gray-50: #f9fafb;
            --color-gray-100: #f3f4f6;
            --color-gray-200: #e5e7eb;
            --color-gray-300: #d1d5db;
            --color-gray-400: #9ca3af;
            --color-gray-500: #6b7280;
            --color-gray-600: #4b5563;
            --color-gray-700: #374151;
            --color-gray-800: #1f2937;
            --color-gray-900: #111827;
            --color-green-50: #f0fdf4;
            --color-green-100: #dcfce7;
            --color-green-200: #bbf7d0;
            --color-green-700: #15803d;
            --color-green-800: #166534;
            --color-red-50: #fef2f2;
            --color-red-200: #fecaca;
            --color-red-700: #b91c1c;
            --color-blue-50: #eff6ff;
            --color-blue-100: #dbeafe;
            --color-blue-800: #1e40af;
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --radius-full: 9999px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            --shadow-inner: inset 0 2px 4px 0 rgba(0, 0, 0, 0.05);
        }

        /* ===== Reset & Base ===== */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            height: 100%;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: var(--font-sans);
            background-color: var(--color-gray-50);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            line-height: 1.5;
            color: var(--color-gray-900);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
            cursor: pointer;
            border: none;
            background: none;
        }

        /* ===== Animations ===== */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(10px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .step-enter {
            animation: slideIn 0.3s ease-out forwards;
        }

        /* ===== Card Container ===== */
        .wizard-card {
            width: 100%;
            max-width: 56rem;
            background-color: var(--color-white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--color-gray-200);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 85vh;
        }

        /* ===== Header ===== */
        .wizard-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--color-gray-100);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            z-index: 10;
        }

        .wizard-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-gray-900);
            letter-spacing: -0.025em;
        }

        .wizard-subtitle {
            font-size: 0.875rem;
            color: var(--color-gray-500);
            margin-top: 0.25rem;
        }

        .step-indicator {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .step-current {
            color: var(--color-denim);
        }

        .step-divider {
            color: var(--color-gray-300);
        }

        .step-total {
            color: var(--color-gray-400);
        }

        /* ===== Progress Bar ===== */
        .progress-container {
            height: 4px;
            width: 100%;
            background-color: var(--color-gray-100);
        }

        .progress-bar {
            height: 100%;
            background-color: var(--color-denim);
            transition: width 0.3s ease-in-out;
        }

        /* ===== Alerts ===== */
        .alert {
            margin: 1rem;
            padding: 1rem;
            border-radius: var(--radius-lg);
            border: 1px solid;
        }

        .alert-success {
            background-color: var(--color-green-50);
            color: var(--color-green-700);
            border-color: var(--color-green-200);
        }

        .alert-error {
            background-color: var(--color-red-50);
            color: var(--color-red-700);
            border-color: var(--color-red-200);
        }

        /* ===== Content Area ===== */
        .wizard-content {
            flex: 1;
            overflow-y: auto;
            padding: 2rem;
            position: relative;
        }

        /* ===== Step 1: Welcome ===== */
        .welcome-container {
            max-width: 42rem;
            margin: 0 auto;
            text-align: center;
            padding: 3rem 0;
        }

        .welcome-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 5rem;
            height: 5rem;
            border-radius: var(--radius-full);
            background-color: rgba(227, 219, 128, 0.2);
            margin-bottom: 1.5rem;
        }

        .welcome-icon svg {
            width: 2.5rem;
            height: 2.5rem;
            color: var(--color-denim);
        }

        .welcome-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--color-gray-900);
            margin-bottom: 1rem;
        }

        .welcome-text {
            color: var(--color-gray-600);
            margin-bottom: 2rem;
            font-size: 1.125rem;
        }

        /* ===== Service Cards ===== */
        .service-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            text-align: left;
            max-width: 32rem;
            margin: 0 auto;
        }

        @media (max-width: 640px) {
            .service-grid {
                grid-template-columns: 1fr;
            }
        }

        .service-card {
            display: block;
            padding: 1rem;
            border: 1px solid var(--color-gray-200);
            border-radius: var(--radius-lg);
            transition: all 0.2s ease;
        }

        .service-card:hover {
            border-color: var(--color-denim);
            background-color: var(--color-blue-50);
        }

        .service-card-title {
            font-weight: 600;
            color: var(--color-gray-900);
            transition: color 0.2s ease;
        }

        .service-card:hover .service-card-title {
            color: var(--color-denim);
        }

        .service-card-desc {
            font-size: 0.875rem;
            color: var(--color-gray-500);
        }

        /* ===== Step 2: Number Selection ===== */
        .number-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .service-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background-color: var(--color-gray-100);
            border-radius: var(--radius-full);
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--color-gray-600);
            margin-bottom: 1rem;
        }

        .number-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--color-gray-900);
        }

        .number-subtitle {
            color: var(--color-gray-500);
            margin-top: 0.25rem;
        }

        /* ===== Number Grid ===== */
        .number-grid {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            gap: 0.75rem;
            max-width: 64rem;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .number-grid {
                grid-template-columns: repeat(8, 1fr);
            }
        }

        @media (max-width: 640px) {
            .number-grid {
                grid-template-columns: repeat(5, 1fr);
            }
        }

        .number-btn {
            padding: 0.5rem;
            border-radius: var(--radius-md);
            border: 1px solid var(--color-gray-200);
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--color-gray-600);
            background-color: var(--color-white);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .number-btn:hover {
            border-color: var(--color-denim);
            color: var(--color-denim);
            box-shadow: var(--shadow-md);
        }

        .number-btn:focus {
            outline: none;
            box-shadow: 0 0 0 2px var(--color-white), 0 0 0 4px var(--color-denim);
        }

        .number-btn-disabled {
            padding: 0.5rem;
            border-radius: var(--radius-md);
            border: 1px solid var(--color-gray-200);
            background-color: var(--color-gray-100);
            color: var(--color-gray-400);
            cursor: not-allowed;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ===== Step 3: Confirmation ===== */
        .confirm-container {
            text-align: center;
            padding: 3rem 0;
        }

        .confirm-number-circle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 6rem;
            height: 6rem;
            border-radius: var(--radius-full);
            background-color: var(--color-grand-corn);
            color: var(--color-denim);
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-inner);
        }

        .confirm-number {
            font-size: 2.25rem;
            font-weight: 800;
        }

        .confirm-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-gray-900);
        }

        .confirm-subtitle {
            color: var(--color-gray-600);
            margin-top: 0.5rem;
        }

        /* ===== Details Card ===== */
        .details-card {
            background-color: var(--color-gray-50);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            max-width: 28rem;
            margin: 2rem auto;
            border: 1px solid var(--color-gray-200);
        }

        .details-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid var(--color-gray-200);
        }

        .details-row:last-child {
            border-bottom: none;
        }

        .details-label {
            color: var(--color-gray-500);
        }

        .details-value {
            font-weight: 500;
            color: var(--color-gray-900);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.125rem 0.625rem;
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 500;
            background-color: var(--color-blue-100);
            color: var(--color-blue-800);
        }

        .status-confirmed {
            background-color: var(--color-green-100);
            color: var(--color-green-800);
        }

        /* ===== Success Icon ===== */
        .success-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 4rem;
            height: 4rem;
            border-radius: var(--radius-full);
            background-color: var(--color-green-100);
            margin-bottom: 1rem;
        }

        .success-icon svg {
            width: 2.5rem;
            height: 2.5rem;
            color: var(--color-green-700);
        }

        .success-title {
            color: var(--color-green-700);
        }

        /* ===== Form ===== */
        .confirm-form {
            margin-top: 2rem;
        }

        .btn-primary {
            width: 100%;
            max-width: 20rem;
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-lg);
            background-color: var(--color-denim);
            color: var(--color-white);
            font-weight: 700;
            font-size: 1rem;
            box-shadow: var(--shadow-lg);
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .btn-primary:active {
            transform: scale(0.95);
        }

        /* ===== Footer ===== */
        .wizard-footer {
            padding: 1.5rem;
            border-top: 1px solid var(--color-gray-100);
            background-color: var(--color-gray-50);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-back {
            padding: 0.625rem 1.5rem;
            border-radius: var(--radius-lg);
            border: 1px solid var(--color-gray-300);
            color: var(--color-gray-700);
            font-weight: 500;
            background-color: transparent;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover {
            background-color: var(--color-white);
            border-color: var(--color-gray-400);
        }

        .btn-cancel {
            font-size: 0.875rem;
            color: var(--color-gray-500);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .btn-cancel:hover {
            color: var(--color-gray-900);
        }

        .footer-spacer {
            width: 1px;
        }

        /* ===== Patient Card ===== */
        .patient-card:hover {
            border-color: var(--color-denim);
            background-color: var(--color-blue-50);
            transform: translateX(4px);
        }

        .patient-card:hover svg {
            color: var(--color-denim);
        }
    </style>
</head>

<body>
    <div class="wizard-card">
        <!-- Header -->
        <header class="wizard-header">
            <div>
                <h1 class="wizard-title">Queue Registration</h1>
                <p class="wizard-subtitle">Follow the steps to secure your spot.</p>
            </div>
            <div class="step-indicator">
                <span class="step-current">Step {{ min($step, 5) }}</span>
                <span class="step-divider">/</span>
                <span class="step-total">5</span>
            </div>
        </header>

        <!-- Progress Bar -->
        <div class="progress-container">
            <div class="progress-bar" style="width: {{ (min($step, 5) / 5) * 100 }}%"></div>
        </div>

        <!-- Alerts -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-error">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Content Area -->
        <div class="wizard-content">

            <!-- Step 1: Patient Identification -->
            @if($step == 1)
                <div class="welcome-container step-enter">
                    <div class="welcome-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h2 class="welcome-title">Patient Identification</h2>
                    <p class="welcome-text">Please search for and identify the patient before proceeding with queue registration.</p>

                    <!-- Search Form -->
                    <form action="{{ route('antrean.wizard') }}" method="GET" class="search-form" style="max-width: 28rem; margin: 0 auto 2rem auto;">
                        <input type="hidden" name="step" value="1">
                        <div style="display: flex; gap: 0.5rem;">
                            <input type="text" name="search" value="{{ $searchQuery ?? '' }}"
                                placeholder="Search by name or PID number..."
                                style="flex: 1; padding: 0.75rem 1rem; border: 1px solid var(--color-gray-300); border-radius: var(--radius-lg); font-size: 1rem; outline: none; transition: border-color 0.2s ease;"
                                onfocus="this.style.borderColor='var(--color-denim)'"
                                onblur="this.style.borderColor='var(--color-gray-300)'">
                            <button type="submit" class="btn-primary" style="max-width: 6rem; padding: 0.75rem 1rem;">
                                Search
                            </button>
                        </div>
                    </form>

                    <!-- Search Results -->
                    @if($searchQuery && $pasiens->count() > 0)
                        <div style="max-width: 32rem; margin: 0 auto;">
                            <p style="font-size: 0.875rem; color: var(--color-gray-500); margin-bottom: 1rem;">
                                Found {{ $pasiens->count() }} patient(s) matching "{{ $searchQuery }}"
                            </p>
                            <div class="patient-list" style="display: flex; flex-direction: column; gap: 0.75rem;">
                                @foreach($pasiens as $pasien)
                                    <a href="{{ route('antrean.wizard', ['step' => 2, 'pasien_id' => $pasien->id]) }}"
                                        class="patient-card" style="display: block; padding: 1rem 1.5rem; border: 1px solid var(--color-gray-200); border-radius: var(--radius-lg); text-align: left; transition: all 0.2s ease; text-decoration: none;">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                            <div>
                                                <div style="font-weight: 600; color: var(--color-gray-900); margin-bottom: 0.25rem;">
                                                    {{ $pasien->nama }}
                                                </div>
                                                <div style="font-size: 0.875rem; color: var(--color-gray-500);">
                                                    PID: {{ $pasien->nomor_pid }} &bull; DOB: {{ $pasien->dob ? \Carbon\Carbon::parse($pasien->dob)->format('d M Y') : 'N/A' }}
                                                </div>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--color-gray-400);">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @elseif($searchQuery && $pasiens->count() == 0)
                        <div style="max-width: 28rem; margin: 0 auto; text-align: center; padding: 2rem; background-color: var(--color-gray-50); border-radius: var(--radius-lg); border: 1px solid var(--color-gray-200);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--color-gray-400); margin-bottom: 1rem;">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                            <p style="color: var(--color-gray-600); margin-bottom: 1rem;">No patients found matching "{{ $searchQuery }}"</p>
                            <a href="{{ route('pasiens.create') }}" class="btn-primary" style="display: inline-block; text-decoration: none; max-width: 12rem;">
                                Register New Patient
                            </a>
                        </div>
                    @else
                        <div style="max-width: 28rem; margin: 0 auto; text-align: center; padding: 2rem; background-color: var(--color-blue-50); border-radius: var(--radius-lg); border: 1px solid var(--color-gray-200);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--color-denim); margin-bottom: 0.75rem;">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                            <p style="color: var(--color-gray-600); font-size: 0.9375rem;">
                                Enter patient name or PID number above to search
                            </p>
                        </div>
                    @endif
                </div>
            @endif

            <!-- Step 2: Service Selection -->
            @if($step == 2)
                <div class="welcome-container step-enter">
                    @if($selectedPasien)
                        <div style="margin-bottom: 1.5rem; padding: 1rem; background-color: var(--color-green-50); border-radius: var(--radius-lg); border: 1px solid var(--color-green-200);">
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--color-green-700);">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                                <div style="text-align: left;">
                                    <div style="font-weight: 600; color: var(--color-green-800);">{{ $selectedPasien->nama }}</div>
                                    <div style="font-size: 0.875rem; color: var(--color-green-700);">PID: {{ $selectedPasien->nomor_pid }}</div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="welcome-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h2 class="welcome-title">Select Service</h2>
                    <p class="welcome-text">Choose the type of consultation for today's visit.</p>

                    <div class="service-grid">
                        <a href="{{ route('antrean.wizard', ['step' => 3, 'pasien_id' => $pasienId, 'service' => 'General Checkup']) }}"
                            class="service-card">
                            <div class="service-card-title">General Checkup</div>
                            <div class="service-card-desc">Regular health screening</div>
                        </a>
                        <a href="{{ route('antrean.wizard', ['step' => 3, 'pasien_id' => $pasienId, 'service' => 'Specialist Consultation']) }}"
                            class="service-card">
                            <div class="service-card-title">Specialist Consultation</div>
                            <div class="service-card-desc">Heart, Eye, or Skin specialist</div>
                        </a>
                    </div>
                </div>
            @endif

            <!-- Step 3: Number Selection -->
            @if($step == 3)
                <div class="step-enter">
                    @if($selectedPasien)
                        <div style="max-width: 64rem; margin: 0 auto 1.5rem auto; padding: 0.75rem 1rem; background-color: var(--color-green-50); border-radius: var(--radius-lg); border: 1px solid var(--color-green-200);">
                            <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.875rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--color-green-700);">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                                <span style="color: var(--color-green-800);"><strong>{{ $selectedPasien->nama }}</strong> ({{ $selectedPasien->nomor_pid }})</span>
                            </div>
                        </div>
                    @endif

                    <div class="number-header">
                        <div class="service-badge">{{ $service ?? 'Select a Service' }}</div>
                        <h2 class="number-title">Select Your Queue Number</h2>
                        <p class="number-subtitle">Available numbers are shown below.</p>
                    </div>

                    <div class="number-grid">
                        @foreach(range(1, 100) as $num)
                            @php
                                $isTaken = in_array($num, $takenNumbers);
                            @endphp

                            @if($isTaken)
                                <div class="number-btn-disabled" title="Taken">{{ $num }}</div>
                            @else
                                <a href="{{ route('antrean.wizard', ['step' => 4, 'pasien_id' => $pasienId, 'service' => $service, 'number' => $num]) }}"
                                    class="number-btn">
                                    {{ $num }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Step 4: Confirmation -->
            @if($step == 4)
                <div class="confirm-container step-enter">
                    <div class="confirm-number-circle">
                        <span class="confirm-number">{{ str_pad($number ?? 0, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <h2 class="confirm-title">Confirm Reservation</h2>
                    <p class="confirm-subtitle">Please review your details before confirming.</p>

                    <div class="details-card">
                        <div class="details-row">
                            <span class="details-label">Patient</span>
                            <span class="details-value">{{ $selectedPasien->nama ?? 'N/A' }}</span>
                        </div>
                        <div class="details-row">
                            <span class="details-label">PID</span>
                            <span class="details-value">{{ $selectedPasien->nomor_pid ?? 'N/A' }}</span>
                        </div>
                        <div class="details-row">
                            <span class="details-label">Service</span>
                            <span class="details-value">{{ $service ?? 'N/A' }}</span>
                        </div>
                        <div class="details-row">
                            <span class="details-label">Queue Number</span>
                            <span class="details-value">{{ str_pad($number ?? 0, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="details-row">
                            <span class="details-label">Date</span>
                            <span class="details-value">{{ now()->toFormattedDateString() }}</span>
                        </div>
                        <div class="details-row">
                            <span class="details-label">Status</span>
                            <span class="status-badge">Draft</span>
                        </div>
                    </div>

                    <form action="{{ route('antrean.wizard.store') }}" method="POST" class="confirm-form">
                        @csrf
                        <input type="hidden" name="pasien_id" value="{{ $pasienId }}">
                        <input type="hidden" name="no_antrean" value="{{ $number ?? '' }}">
                        <input type="hidden" name="service" value="{{ $service ?? '' }}">

                        <button type="submit" class="btn-primary">
                            Confirm & Book Ticket
                        </button>
                    </form>
                </div>
            @endif

            <!-- Step 5: Success / Stored Data -->
            @if($step == 5 && isset($antrean))
                <div class="confirm-container step-enter">
                    <div class="success-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="confirm-number-circle">
                        <span class="confirm-number">{{ str_pad($antrean->no_antrean ?? 0, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <h2 class="confirm-title success-title">Registration Successful!</h2>
                    <p class="confirm-subtitle">Your queue registration has been saved.</p>

                    <div class="details-card">
                        <div class="details-row">
                            <span class="details-label">Queue Number</span>
                            <span class="details-value">{{ $antrean->no_antrean }}</span>
                        </div>
                        <div class="details-row">
                            <span class="details-label">Service</span>
                            <span class="details-value">{{ $antrean->service ?? 'N/A' }}</span>
                        </div>
                        <div class="details-row">
                            <span class="details-label">Patient</span>
                            <span class="details-value">{{ $antrean->pasien->nama ?? 'N/A' }}</span>
                        </div>
                        <div class="details-row">
                            <span class="details-label">PID</span>
                            <span class="details-value">{{ $antrean->pasien->nomor_pid ?? 'N/A' }}</span>
                        </div>
                        <div class="details-row">
                            <span class="details-label">Date</span>
                            <span class="details-value">{{ $antrean->created_at->toFormattedDateString() }}</span>
                        </div>
                        <div class="details-row">
                            <span class="details-label">Time</span>
                            <span class="details-value">{{ $antrean->created_at->format('H:i') }}</span>
                        </div>
                        <div class="details-row">
                            <span class="details-label">Status</span>
                            <span class="status-badge status-confirmed">Confirmed</span>
                        </div>
                    </div>

                    <a href="{{ route('antrean.wizard') }}" class="btn-primary"
                        style="display: inline-block; text-decoration: none;">
                        Register Another Queue
                    </a>
                </div>
            @endif

        </div>

        <!-- Footer / Navigation -->
        <footer class="wizard-footer">
            @if($step > 1 && $step < 5)
                <a href="{{ route('antrean.wizard', ['step' => $step - 1, 'pasien_id' => $pasienId ?? '', 'service' => $service ?? '', 'number' => $number ?? '']) }}"
                    class="btn-back">
                    Back
                </a>
            @else
                <div class="footer-spacer"></div>
            @endif

            @if($step == 4)
                <a href="{{ route('antrean.wizard') }}" class="btn-cancel">Cancel</a>
            @endif

            @if($step == 5)
                <a href="{{ route('antrean.wizard') }}" class="btn-cancel">Start Over</a>
            @endif
        </footer>
    </div>
</body>

</html>
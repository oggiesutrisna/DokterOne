<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVID-19 Test Result - {{ $pasien->nama }} | Unicare Clinic</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Neubrutalism Theme -->
  <link rel="stylesheet" href="{{ asset('css/neubrutalism.css') }}">

  <style>
    :root {
      --primary-color: #1a5276;
      --success-color: #27ae60;
      --danger-color: #e74c3c;
      --light-bg: #f8f9fa;
      --border-color: #e0e0e0;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .result-container {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
      max-width: 500px;
      width: 100%;
      overflow: hidden;
    }

    .result-header {
      background: var(--primary-color);
      color: #fff;
      padding: 30px;
      text-align: center;
    }

    .result-header .logo {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 5px;
    }

    .result-header .subtitle {
      font-size: 14px;
      opacity: 0.9;
    }

    .result-badge {
      display: flex;
      width: fit-content;
      align-items: center;
      justify-content: center;
      padding: 15px 40px;
      border-radius: 50px;
      font-size: 24px;
      font-weight: 700;
      text-transform: uppercase;
      margin: -35px auto 0;
      position: relative;
      z-index: 10;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .result-badge.negative {
      background: linear-gradient(135deg, #27ae60, #2ecc71);
      color: #fff;
    }

    .result-badge.positive {
      background: linear-gradient(135deg, #e74c3c, #c0392b);
      color: #fff;
    }

    .result-badge i {
      margin-right: 10px;
      font-size: 28px;
    }

    .result-body {
      padding: 50px 30px 30px;
    }

    .patient-name {
      text-align: center;
      margin-bottom: 25px;
    }

    .patient-name h2 {
      font-size: 24px;
      font-weight: 600;
      color: #333;
      margin-bottom: 5px;
    }

    .patient-name .doc-number {
      font-size: 14px;
      color: #666;
    }

    .info-list {
      list-style: none;
      padding: 0;
    }

    .info-list li {
      display: flex;
      justify-content: space-between;
      padding: 15px 0;
      border-bottom: 1px solid var(--border-color);
    }

    .info-list li:last-child {
      border-bottom: none;
    }

    .info-list .label {
      color: #666;
      font-size: 14px;
      font-weight: 500;
    }

    .info-list .value {
      color: #333;
      font-size: 14px;
      font-weight: 600;
      text-align: right;
    }

    .test-info {
      background: var(--light-bg);
      border-radius: 12px;
      padding: 20px;
      margin-top: 25px;
    }

    .test-info h4 {
      font-size: 12px;
      text-transform: uppercase;
      color: #666;
      margin-bottom: 15px;
      letter-spacing: 1px;
    }

    .test-info .test-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .test-info .test-row:last-child {
      margin-bottom: 0;
    }

    .verified-badge {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 25px;
      padding: 15px;
      background: #e8f5e9;
      border-radius: 10px;
      color: #27ae60;
    }

    .verified-badge i {
      margin-right: 10px;
      font-size: 20px;
    }

    .result-footer {
      text-align: center;
      padding: 20px 30px 30px;
      background: var(--light-bg);
    }

    .result-footer p {
      font-size: 12px;
      color: #666;
      margin-bottom: 10px;
    }

    .result-footer .brand {
      font-size: 14px;
      color: #333;
      font-weight: 600;
    }

    .result-footer .brand a {
      color: var(--primary-color);
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="result-container">
    <div class="result-header">
      <div class="logo">🏥 UNICARE CLINIC</div>
      <div class="subtitle">COVID-19 Test Result Certificate</div>
    </div>

    <div class="result-badge {{ strtolower($pasien->result) == 'negative' ? 'negative' : 'positive' }}">
      <i class="fas {{ strtolower($pasien->result) == 'negative' ? 'fa-check-circle' : 'fa-exclamation-circle' }}"></i>
      {{ $pasien->result }}
    </div>

    <div class="result-body">
      <div class="patient-name">
        <h2>{{ $pasien->nama }}</h2>
        <div class="doc-number">Document No: {{ $pasien->nosurat }}</div>
      </div>

      <ul class="info-list">
        <li>
          <span class="label"><i class="fas fa-calendar-alt mr-2"></i>Date of Birth</span>
          <span class="value">{{ \Carbon\Carbon::parse($pasien->dob)->format('F j, Y') }}</span>
        </li>
        <li>
          <span class="label"><i class="fas fa-venus-mars mr-2"></i>Gender</span>
          <span class="value">{{ $pasien->jenis_kelamin }}</span>
        </li>
        <li>
          <span class="label"><i class="fas fa-passport mr-2"></i>Passport/ID</span>
          <span class="value">{{ $pasien->nomor_pid }}</span>
        </li>
        <li>
          <span class="label"><i class="fas fa-globe mr-2"></i>Nationality</span>
          <span class="value">{{ $pasien->nationality }}</span>
        </li>
        <li>
          <span class="label"><i class="fas fa-clock mr-2"></i>Sampling Time</span>
          <span class="value">{{ \Carbon\Carbon::parse($pasien->sampling_time)->format('M j, Y, g:i A') }}</span>
        </li>
      </ul>

      <div class="test-info">
        <h4>Test Information</h4>
        <div class="test-row">
          <span class="label">Test Type</span>
          <span class="value">{{ $pasien->jenis_pemeriksaan }}</span>
        </div>
        <div class="test-row">
          <span class="label">Method</span>
          <span class="value">Swab Antigen Test</span>
        </div>
      </div>

      <div class="verified-badge">
        <i class="fas fa-shield-alt"></i>
        <span>Verified by Unicare Clinic QR System</span>
      </div>
    </div>

    <div class="result-footer">
      <p>This certificate was issued by Unicare Clinic and can be verified by scanning the QR code.</p>
      <div class="brand">
        Built with 💖 by <a href="https://twitter.com/oggiesutrisna" target="_blank">Oggie Sutrisna</a>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
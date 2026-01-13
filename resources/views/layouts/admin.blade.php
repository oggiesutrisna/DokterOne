<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Faskes Unicare - Healthcare Management System">
  <meta name="theme-color" content="#215E61">
  
  <title>@yield('title', 'Dashboard') - Faskes Unicare</title>

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🏥</text></svg>">

  <!-- Preconnect -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
  
  <style>
    :root {
      --bg: #f4f6f8;
      --bg-card: #ffffff;
      --bg-cream: #F5FBE6;
      --primary: #FE7F2D;
      --primary-hover: #e56c20;
      --primary-light: #fff4ed;
      --secondary: #215E61;
      --secondary-light: #e8f4f4;
      --dark: #1e293b;
      --text: #334155;
      --text-muted: #64748b;
      --border: #e2e8f0;
      --success: #10b981;
      --success-light: #d1fae5;
      --warning: #f59e0b;
      --warning-light: #fef3c7;
      --danger: #ef4444;
      --danger-light: #fee2e2;
      --info: #3b82f6;
      --info-light: #dbeafe;
      --radius: 12px;
      --radius-sm: 8px;
      --radius-lg: 16px;
      --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
      --shadow: 0 1px 3px rgba(0,0,0,0.1), 0 1px 2px rgba(0,0,0,0.06);
      --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
      --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
      --transition: all 0.2s ease;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      background: var(--bg);
      color: var(--text);
      line-height: 1.5;
      font-size: 14px;
      -webkit-font-smoothing: antialiased;
    }

    /* ========== LAYOUT ========== */
    .app-wrapper {
      display: flex;
      min-height: 100vh;
    }

    /* ========== SIDEBAR ========== */
    .sidebar {
      width: 260px;
      background: var(--bg-card);
      border-right: 1px solid var(--border);
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      display: flex;
      flex-direction: column;
      z-index: 1000;
      transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .sidebar-brand {
      padding: 1.25rem 1.5rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      border-bottom: 1px solid var(--border);
    }

    .sidebar-brand-icon {
      width: 40px;
      height: 40px;
      background: linear-gradient(135deg, var(--primary), var(--primary-hover));
      border-radius: var(--radius-sm);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.25rem;
      box-shadow: var(--shadow-sm);
    }

    .sidebar-brand-text {
      font-weight: 700;
      font-size: 1.125rem;
      color: var(--dark);
    }

    .sidebar-brand-text span {
      color: var(--primary);
    }

    .sidebar-menu {
      flex: 1;
      padding: 1rem 0;
      overflow-y: auto;
    }

    .sidebar-section {
      padding: 0 0.75rem;
      margin-bottom: 1.25rem;
    }

    .sidebar-section-title {
      font-size: 0.65rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      color: var(--text-muted);
      padding: 0 0.75rem;
      margin-bottom: 0.5rem;
    }

    .sidebar-nav {
      list-style: none;
    }

    .sidebar-nav-item {
      margin-bottom: 2px;
    }

    .sidebar-nav-link {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.625rem 0.75rem;
      border-radius: var(--radius-sm);
      color: var(--text);
      text-decoration: none;
      font-weight: 500;
      font-size: 0.875rem;
      transition: var(--transition);
    }

    .sidebar-nav-link:hover {
      background: var(--bg);
      color: var(--dark);
    }

    .sidebar-nav-link.active {
      background: var(--primary-light);
      color: var(--primary);
    }

    .sidebar-nav-icon {
      width: 18px;
      text-align: center;
      font-size: 0.95rem;
      opacity: 0.7;
    }

    .sidebar-nav-link.active .sidebar-nav-icon {
      opacity: 1;
      color: var(--primary);
    }

    .sidebar-nav-badge {
      margin-left: auto;
      background: var(--primary);
      color: white;
      font-size: 0.65rem;
      font-weight: 600;
      padding: 0.125rem 0.5rem;
      border-radius: 10px;
      min-width: 20px;
      text-align: center;
    }

    .sidebar-footer {
      padding: 1rem;
      border-top: 1px solid var(--border);
    }

    .sidebar-user {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.75rem;
      background: var(--bg);
      border-radius: var(--radius-sm);
      margin-bottom: 0.75rem;
    }

    .sidebar-user-avatar {
      width: 36px;
      height: 36px;
      background: linear-gradient(135deg, var(--secondary), #1a4a4d);
      border-radius: var(--radius-sm);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 600;
      font-size: 0.875rem;
    }

    .sidebar-user-info {
      flex: 1;
      min-width: 0;
    }

    .sidebar-user-name {
      font-weight: 600;
      font-size: 0.875rem;
      color: var(--dark);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .sidebar-user-role {
      font-size: 0.75rem;
      color: var(--text-muted);
    }

    .sidebar-logout-btn {
      width: 100%;
      padding: 0.625rem;
      background: var(--bg);
      border: 1px solid var(--border);
      border-radius: var(--radius-sm);
      color: var(--text);
      font-weight: 500;
      font-size: 0.8125rem;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      transition: var(--transition);
    }

    .sidebar-logout-btn:hover {
      background: var(--danger-light);
      border-color: var(--danger);
      color: var(--danger);
    }

    /* ========== MAIN CONTENT ========== */
    .main-wrapper {
      flex: 1;
      margin-left: 260px;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* ========== TOP NAVBAR ========== */
    .top-navbar {
      background: var(--bg-card);
      border-bottom: 1px solid var(--border);
      padding: 0 1.5rem;
      height: 64px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .navbar-left {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .navbar-toggle {
      display: none;
      width: 40px;
      height: 40px;
      background: var(--bg);
      border: none;
      border-radius: var(--radius-sm);
      color: var(--dark);
      cursor: pointer;
      font-size: 1.125rem;
      transition: var(--transition);
    }

    .navbar-toggle:hover {
      background: var(--border);
    }

    .navbar-breadcrumb {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.875rem;
    }

    .navbar-breadcrumb-item {
      color: var(--text-muted);
    }

    .navbar-breadcrumb-item.active {
      color: var(--dark);
      font-weight: 600;
    }

    .navbar-breadcrumb-separator {
      color: var(--border);
    }

    .navbar-center {
      flex: 1;
      max-width: 400px;
      margin: 0 1rem;
    }

    .navbar-search {
      position: relative;
      width: 100%;
    }

    .navbar-search-input {
      width: 100%;
      padding: 0.5rem 1rem 0.5rem 2.5rem;
      background: var(--bg);
      border: 1px solid transparent;
      border-radius: 20px;
      font-size: 0.875rem;
      color: var(--text);
      transition: var(--transition);
    }

    .navbar-search-input:focus {
      outline: none;
      background: var(--bg-card);
      border-color: var(--primary);
      box-shadow: 0 0 0 3px var(--primary-light);
    }

    .navbar-search-input::placeholder {
      color: var(--text-muted);
    }

    .navbar-search-icon {
      position: absolute;
      left: 0.875rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-muted);
      font-size: 0.875rem;
    }

    .navbar-right {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .navbar-btn {
      width: 40px;
      height: 40px;
      border-radius: var(--radius-sm);
      border: none;
      background: var(--bg);
      color: var(--text-muted);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
      position: relative;
    }

    .navbar-btn:hover {
      background: var(--border);
      color: var(--dark);
    }

    .navbar-btn-badge {
      position: absolute;
      top: 8px;
      right: 8px;
      width: 8px;
      height: 8px;
      background: var(--primary);
      border-radius: 50%;
      border: 2px solid var(--bg-card);
    }

    .navbar-user-btn {
      display: flex;
      align-items: center;
      gap: 0.625rem;
      padding: 0.375rem 0.75rem 0.375rem 0.375rem;
      background: var(--bg);
      border: none;
      border-radius: 20px;
      cursor: pointer;
      transition: var(--transition);
    }

    .navbar-user-btn:hover {
      background: var(--border);
    }

    .navbar-user-avatar {
      width: 32px;
      height: 32px;
      background: linear-gradient(135deg, var(--secondary), #1a4a4d);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 600;
      font-size: 0.75rem;
    }

    .navbar-user-name {
      font-weight: 500;
      font-size: 0.875rem;
      color: var(--dark);
    }

    /* ========== CONTENT ========== */
    .content-wrapper {
      flex: 1;
      padding: 1.5rem;
    }

    .content-header {
      margin-bottom: 1.5rem;
    }

    .content-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--dark);
      margin-bottom: 0.25rem;
    }

    .content-subtitle {
      font-size: 0.875rem;
      color: var(--text-muted);
    }

    /* ========== CARDS ========== */
    .card {
      background: var(--bg-card);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      box-shadow: var(--shadow-sm);
    }

    .card-header {
      padding: 1rem 1.25rem;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
    }

    .card-title {
      font-weight: 600;
      font-size: 0.9375rem;
      color: var(--dark);
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .card-body {
      padding: 1.25rem;
    }

    /* ========== STATS CARDS ========== */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .stat-card {
      background: var(--bg-card);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      padding: 1.25rem;
      display: flex;
      align-items: center;
      gap: 1rem;
      transition: var(--transition);
    }

    .stat-card:hover {
      box-shadow: var(--shadow-md);
      transform: translateY(-2px);
    }

    .stat-icon {
      width: 48px;
      height: 48px;
      border-radius: var(--radius-sm);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.25rem;
    }

    .stat-icon.orange { background: var(--primary-light); color: var(--primary); }
    .stat-icon.teal { background: var(--secondary-light); color: var(--secondary); }
    .stat-icon.green { background: var(--success-light); color: var(--success); }
    .stat-icon.red { background: var(--danger-light); color: var(--danger); }
    .stat-icon.blue { background: var(--info-light); color: var(--info); }
    .stat-icon.yellow { background: var(--warning-light); color: var(--warning); }

    .stat-content {
      flex: 1;
    }

    .stat-value {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--dark);
      line-height: 1.2;
    }

    .stat-label {
      font-size: 0.8125rem;
      color: var(--text-muted);
    }

    /* ========== TABLE ========== */
    .table-card {
      background: var(--bg-card);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      overflow: hidden;
    }

    .table-header {
      padding: 1rem 1.25rem;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .table-title {
      font-weight: 600;
      font-size: 0.9375rem;
      color: var(--dark);
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .table-body {
      padding: 1rem;
    }

    /* DataTables Overrides */
    .dataTables_wrapper {
      font-size: 0.875rem;
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
      margin-bottom: 1rem;
    }

    .dataTables_wrapper .dataTables_length label,
    .dataTables_wrapper .dataTables_filter label {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin: 0;
      font-weight: 500;
      color: var(--text-muted);
    }

    .dataTables_wrapper .dataTables_length select {
      padding: 0.5rem 2rem 0.5rem 0.75rem;
      border: 1px solid var(--border);
      border-radius: var(--radius-sm);
      background: var(--bg-card);
      font-size: 0.875rem;
      color: var(--text);
      cursor: pointer;
    }

    .dataTables_wrapper .dataTables_filter input {
      padding: 0.5rem 0.75rem;
      border: 1px solid var(--border);
      border-radius: var(--radius-sm);
      background: var(--bg-card);
      font-size: 0.875rem;
      color: var(--text);
      width: 200px;
      transition: var(--transition);
    }

    .dataTables_wrapper .dataTables_filter input:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px var(--primary-light);
    }

    .dataTables_wrapper .dataTables_info {
      font-size: 0.8125rem;
      color: var(--text-muted);
      padding-top: 1rem;
    }

    .dataTables_wrapper .dataTables_paginate {
      padding-top: 1rem;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
      padding: 0.375rem 0.75rem;
      margin: 0 2px;
      border-radius: var(--radius-sm);
      font-size: 0.8125rem;
      font-weight: 500;
      border: 1px solid var(--border) !important;
      background: var(--bg-card) !important;
      color: var(--text) !important;
      transition: var(--transition);
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background: var(--bg) !important;
      border-color: var(--primary) !important;
      color: var(--primary) !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background: var(--primary) !important;
      border-color: var(--primary) !important;
      color: white !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    table.dataTable {
      width: 100% !important;
      border-collapse: collapse !important;
    }

    table.dataTable thead th {
      background: var(--bg);
      padding: 0.75rem 1rem !important;
      font-weight: 600;
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.03em;
      color: var(--text-muted);
      border-bottom: 1px solid var(--border) !important;
      white-space: nowrap;
    }

    table.dataTable tbody td {
      padding: 0.875rem 1rem !important;
      border-bottom: 1px solid var(--border) !important;
      vertical-align: middle;
    }

    table.dataTable tbody tr:hover {
      background: var(--bg) !important;
    }

    table.dataTable tbody tr:last-child td {
      border-bottom: none !important;
    }

    /* ========== BUTTONS ========== */
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      padding: 0.5rem 1rem;
      border-radius: var(--radius-sm);
      font-weight: 500;
      font-size: 0.875rem;
      border: none;
      cursor: pointer;
      transition: var(--transition);
      text-decoration: none;
      white-space: nowrap;
    }

    .btn-primary {
      background: var(--primary);
      color: white;
    }

    .btn-primary:hover {
      background: var(--primary-hover);
    }

    .btn-secondary {
      background: var(--bg);
      color: var(--text);
      border: 1px solid var(--border);
    }

    .btn-secondary:hover {
      background: var(--border);
    }

    .btn-sm {
      padding: 0.375rem 0.75rem;
      font-size: 0.8125rem;
    }

    /* ========== ACTION BUTTONS ========== */
    .action-btns {
      display: flex;
      gap: 0.25rem;
    }

    .action-btn {
      width: 32px;
      height: 32px;
      border-radius: var(--radius-sm);
      border: none;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.8125rem;
      cursor: pointer;
      transition: var(--transition);
      text-decoration: none;
    }

    .action-btn:hover {
      transform: scale(1.1);
    }

    .action-btn-view { background: var(--info-light); color: var(--info); }
    .action-btn-edit { background: var(--warning-light); color: var(--warning); }
    .action-btn-delete { background: var(--danger-light); color: var(--danger); }
    .action-btn-download { background: var(--success-light); color: var(--success); }
    .action-btn-pdf { background: var(--primary-light); color: var(--primary); }

    /* ========== BADGES ========== */
    .badge {
      display: inline-flex;
      align-items: center;
      gap: 0.25rem;
      padding: 0.25rem 0.625rem;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 500;
    }

    .badge-success { background: var(--success-light); color: var(--success); }
    .badge-danger { background: var(--danger-light); color: var(--danger); }
    .badge-warning { background: var(--warning-light); color: var(--warning); }
    .badge-info { background: var(--info-light); color: var(--info); }
    .badge-primary { background: var(--primary-light); color: var(--primary); }

    /* ========== ALERTS ========== */
    .alert {
      padding: 0.875rem 1rem;
      border-radius: var(--radius-sm);
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      font-size: 0.875rem;
    }

    .alert-success { background: var(--success-light); color: var(--success); border-left: 3px solid var(--success); }
    .alert-danger { background: var(--danger-light); color: var(--danger); border-left: 3px solid var(--danger); }
    .alert-warning { background: var(--warning-light); color: var(--warning); border-left: 3px solid var(--warning); }
    .alert-info { background: var(--info-light); color: var(--info); border-left: 3px solid var(--info); }

    .alert-close {
      margin-left: auto;
      background: none;
      border: none;
      font-size: 1.125rem;
      cursor: pointer;
      opacity: 0.6;
      transition: var(--transition);
    }

    .alert-close:hover {
      opacity: 1;
    }

    /* ========== AVATAR ========== */
    .avatar {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .avatar-img {
      width: 36px;
      height: 36px;
      border-radius: var(--radius-sm);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
      font-size: 0.875rem;
      color: white;
    }

    .avatar-info {
      flex: 1;
      min-width: 0;
    }

    .avatar-name {
      font-weight: 500;
      color: var(--dark);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .avatar-sub {
      font-size: 0.75rem;
      color: var(--text-muted);
    }

    /* ========== UTILITIES ========== */
    .text-muted { color: var(--text-muted); }
    .text-primary { color: var(--primary); }
    .text-success { color: var(--success); }
    .text-danger { color: var(--danger); }
    .font-medium { font-weight: 500; }
    .font-semibold { font-weight: 600; }
    
    .mb-0 { margin-bottom: 0; }
    .mb-1 { margin-bottom: 0.5rem; }
    .mb-2 { margin-bottom: 1rem; }
    .mb-3 { margin-bottom: 1.5rem; }

    .row {
      display: flex;
      flex-wrap: wrap;
      margin: -0.5rem;
    }

    [class*="col-"] {
      padding: 0.5rem;
    }

    .col-12 { flex: 0 0 100%; max-width: 100%; }

    @media (min-width: 768px) {
      .col-md-3 { flex: 0 0 25%; max-width: 25%; }
      .col-md-4 { flex: 0 0 33.333%; max-width: 33.333%; }
      .col-md-6 { flex: 0 0 50%; max-width: 50%; }
      .col-md-8 { flex: 0 0 66.666%; max-width: 66.666%; }
    }

    /* ========== SIDEBAR OVERLAY ========== */
    .sidebar-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.5);
      z-index: 999;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .sidebar-overlay.show {
      display: block;
      opacity: 1;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 1024px) {
      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.show {
        transform: translateX(0);
      }

      .main-wrapper {
        margin-left: 0;
      }

      .navbar-toggle {
        display: flex;
      }

      .navbar-center {
        display: none;
      }

      .navbar-user-name {
        display: none;
      }
    }

    @media (max-width: 640px) {
      .content-wrapper {
        padding: 1rem;
      }

      .table-header {
        flex-direction: column;
        align-items: flex-start;
      }

      .stats-grid {
        grid-template-columns: 1fr;
      }
    }

    /* ========== EMPTY STATE ========== */
    .empty-state {
      text-align: center;
      padding: 3rem 1.5rem;
    }

    .empty-state-icon {
      font-size: 3rem;
      color: var(--border);
      margin-bottom: 1rem;
    }

    .empty-state-title {
      font-size: 1.125rem;
      font-weight: 600;
      color: var(--dark);
      margin-bottom: 0.5rem;
    }

    .empty-state-text {
      color: var(--text-muted);
      margin-bottom: 1.5rem;
    }
  </style>

  @stack('styles')
</head>

<body>
  <div class="app-wrapper">
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Main -->
    <div class="main-wrapper">
      <!-- Navbar -->
      @include('layouts.navbar')

      <!-- Content -->
      <div class="content-wrapper">
        <!-- Header -->
        <div class="content-header">
          <h1 class="content-title">@yield('title')</h1>
          @hasSection('subtitle')
            <p class="content-subtitle">@yield('subtitle')</p>
          @endif
        </div>

        <!-- Alerts -->
        @if(session('success'))
          <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
            <button class="alert-close" onclick="this.parentElement.remove()">&times;</button>
          </div>
        @endif

        @if(session('error'))
          <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
            <button class="alert-close" onclick="this.parentElement.remove()">&times;</button>
          </div>
        @endif

        <!-- Content -->
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
  
  <script>
    // Sidebar Toggle
    document.addEventListener('DOMContentLoaded', function() {
      const toggle = document.querySelector('.navbar-toggle');
      const sidebar = document.querySelector('.sidebar');
      const overlay = document.getElementById('sidebarOverlay');

      if (toggle) {
        toggle.addEventListener('click', function() {
          sidebar.classList.toggle('show');
          overlay.classList.toggle('show');
        });
      }

      if (overlay) {
        overlay.addEventListener('click', function() {
          sidebar.classList.remove('show');
          overlay.classList.remove('show');
        });
      }

      // Auto-hide alerts
      document.querySelectorAll('.alert').forEach(function(alert) {
        setTimeout(() => alert.remove(), 5000);
      });
    });

    // DataTables Default Config
    $.extend(true, $.fn.dataTable.defaults, {
      language: {
        search: "",
        searchPlaceholder: "Search...",
        lengthMenu: "_MENU_ per page",
        info: "Showing _START_ to _END_ of _TOTAL_",
        infoEmpty: "No records",
        infoFiltered: "(filtered from _MAX_)",
        zeroRecords: "No matching records found",
        paginate: { first: "«", last: "»", next: "›", previous: "‹" }
      },
      pageLength: 10,
      lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
      order: [[0, 'desc']],
      dom: '<"flex justify-between items-center mb-4"lf>rt<"flex justify-between items-center mt-4"ip>'
    });
  </script>

  @stack('scripts')
</body>
</html>

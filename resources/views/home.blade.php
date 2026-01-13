@extends('layouts.admin')
@section('title', 'Dashboard')
@section('subtitle', 'Welcome back! Here\'s your overview.')

@section('content')
<!-- Stats -->
<div class="stats-grid">
  <div class="stat-card">
    <div class="stat-icon orange">
      <i class="fas fa-users"></i>
    </div>
    <div class="stat-content">
      <div class="stat-value">{{ \App\Models\Pasien::count() }}</div>
      <div class="stat-label">Total Patients</div>
    </div>
  </div>
  <div class="stat-card">
    <div class="stat-icon teal">
      <i class="fas fa-user-md"></i>
    </div>
    <div class="stat-content">
      <div class="stat-value">{{ \App\Models\Dokter::count() }}</div>
      <div class="stat-label">Total Doctors</div>
    </div>
  </div>
  <div class="stat-card">
    <div class="stat-icon green">
      <i class="fas fa-user-nurse"></i>
    </div>
    <div class="stat-content">
      <div class="stat-value">{{ \App\Models\Perawat::count() }}</div>
      <div class="stat-label">Total Nurses</div>
    </div>
  </div>
  <div class="stat-card">
    <div class="stat-icon yellow">
      <i class="fas fa-clipboard-list"></i>
    </div>
    <div class="stat-content">
      <div class="stat-value">{{ \App\Models\Antrean::whereDate('created_at', today())->count() }}</div>
      <div class="stat-label">Today's Queue</div>
    </div>
  </div>
</div>

<!-- Welcome Card -->
<div class="card mb-3">
  <div class="card-body" style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
    <div style="
      width: 64px;
      height: 64px;
      background: linear-gradient(135deg, var(--primary), var(--primary-hover));
      border-radius: var(--radius);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
    ">👋</div>
    <div style="flex: 1; min-width: 200px;">
      <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--dark); margin-bottom: 0.25rem;">
        Welcome back, {{ Auth::user()->name }}!
      </h2>
      <p style="color: var(--text-muted); margin: 0;">
        You're logged in as an Administrator. Manage your healthcare facility efficiently.
      </p>
    </div>
    <a href="{{ route('pasiens.create') }}" class="btn btn-primary">
      <i class="fas fa-plus"></i> Add Patient
    </a>
  </div>
</div>

<!-- Quick Actions -->
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <i class="fas fa-bolt text-primary"></i>
          Quick Actions
        </div>
      </div>
      <div class="card-body">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); gap: 0.75rem;">
          <a href="{{ route('pasiens.index') }}" class="btn btn-secondary" style="flex-direction: column; padding: 1.25rem; height: auto;">
            <i class="fas fa-users" style="font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--primary);"></i>
            <span>Patients</span>
          </a>
          <a href="{{ route('dokters.index') }}" class="btn btn-secondary" style="flex-direction: column; padding: 1.25rem; height: auto;">
            <i class="fas fa-user-md" style="font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--secondary);"></i>
            <span>Doctors</span>
          </a>
          <a href="{{ route('perawats.index') }}" class="btn btn-secondary" style="flex-direction: column; padding: 1.25rem; height: auto;">
            <i class="fas fa-user-nurse" style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #c2185b;"></i>
            <span>Nurses</span>
          </a>
          <a href="{{ route('antreans.index') }}" class="btn btn-secondary" style="flex-direction: column; padding: 1.25rem; height: auto;">
            <i class="fas fa-clipboard-list" style="font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--warning);"></i>
            <span>Queue</span>
          </a>
          <a href="{{ route('absensis.index') }}" class="btn btn-secondary" style="flex-direction: column; padding: 1.25rem; height: auto;">
            <i class="fas fa-calendar-check" style="font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--info);"></i>
            <span>Attendance</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card" style="height: 100%;">
      <div class="card-header">
        <div class="card-title">
          <i class="fas fa-headset text-primary"></i>
          Need Help?
        </div>
      </div>
      <div class="card-body">
        <p style="font-size: 0.875rem; color: var(--text-muted); margin-bottom: 1rem;">
          Found a bug or need support? Contact us:
        </p>
        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
          <a href="https://api.whatsapp.com/send?phone=087846048999" target="_blank" class="btn btn-sm" style="background: #25d366; color: white; justify-content: flex-start;">
            <i class="fab fa-whatsapp"></i> WhatsApp
          </a>
          <a href="https://twitter.com/@oggiesutrisna" target="_blank" class="btn btn-sm" style="background: #1da1f2; color: white; justify-content: flex-start;">
            <i class="fab fa-twitter"></i> Twitter
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

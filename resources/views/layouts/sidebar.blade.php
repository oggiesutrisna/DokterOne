<aside class="sidebar">
  <!-- Brand -->
  <div class="sidebar-brand">
    <div class="sidebar-brand-icon">🏥</div>
    <div class="sidebar-brand-text">Faskes<span>Unicare</span></div>
  </div>

  <!-- Menu -->
  <nav class="sidebar-menu">
    <!-- Menu -->
    <div class="sidebar-section">
      <div class="sidebar-section-title">Menu</div>
      <ul class="sidebar-nav">
        <li class="sidebar-nav-item">
          <a href="{{ route('home') }}" class="sidebar-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
            <i class="sidebar-nav-icon fas fa-home"></i>
            <span>Dashboard</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Data -->
    <div class="sidebar-section">
      <div class="sidebar-section-title">Data</div>
      <ul class="sidebar-nav">
        <li class="sidebar-nav-item">
          <a href="{{ route('pasiens.index') }}" class="sidebar-nav-link {{ request()->routeIs('pasiens.*') ? 'active' : '' }}">
            <i class="sidebar-nav-icon fas fa-users"></i>
            <span>Pasien</span>
            <span class="sidebar-nav-badge">{{ \App\Models\Pasien::count() }}</span>
          </a>
        </li>
      </ul>
    </div>

  </nav>

  <!-- Footer -->
  <div class="sidebar-footer">
    <div class="sidebar-user">
      <div class="sidebar-user-avatar">
        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
      </div>
      <div class="sidebar-user-info">
        <div class="sidebar-user-name">{{ Auth::user()->name ?? 'Guest' }}</div>
        <div class="sidebar-user-role">Administrator</div>
      </div>
    </div>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="sidebar-logout-btn">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
      </button>
    </form>
  </div>
</aside>

<nav class="top-navbar">
  <!-- Left -->
  <div class="navbar-left">
    <button class="navbar-toggle" id="sidebarToggle">
      <i class="fas fa-bars"></i>
    </button>
    <div class="navbar-breadcrumb">
      <span class="navbar-breadcrumb-item">Dashboard</span>
      <span class="navbar-breadcrumb-separator">/</span>
      <span class="navbar-breadcrumb-item active">@yield('title', 'Home')</span>
    </div>
  </div>

  <!-- Center -->
  <div class="navbar-center">
    <form action="{{ route('pasiens.index') }}" method="GET" class="navbar-search">
      <i class="fas fa-search navbar-search-icon"></i>
      <input type="text" class="navbar-search-input" placeholder="Search patients..." name="search" value="{{ request('search') }}">
    </form>
  </div>

  <!-- Right -->
  <div class="navbar-right">
    <button class="navbar-btn" title="Notifications">
      <i class="fas fa-bell"></i>
      <span class="navbar-btn-badge"></span>
    </button>
    <button class="navbar-user-btn">
      <div class="navbar-user-avatar">
        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
      </div>
      <span class="navbar-user-name">{{ Auth::user()->name ?? 'Guest' }}</span>
    </button>
  </div>
</nav>

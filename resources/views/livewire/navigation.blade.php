<nav class="navbar navbar-dark fixed-top navbar-expand-lg sitenav">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'navblue fw-bold' : '' }}" href="/" ><i class="fas fa-home me-1"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('donate') ? 'navblue fw-bold' : '' }}" href="/donate" ><i class="fa-solid fa-sterling-sign me-1"></i> Donate</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('leaderboards') ? 'navblue fw-bold' : '' }}" href="/leaderboards" ><i class="fa-solid fa-chart-simple me-1"></i> Leaderboards</a>
        </li>
        @auth
        @if (auth()->user()->hasPermission(['2', '3']))
        <li class="nav-item dropdown">
        <a class="nav-link {{ request()->is('login', 'register', 'account-settings', 'transaction-history') ? 'navblue fw-bold' : '' }} dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="fa-solid fa-cog me-1"></i> Admin
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/admin"><i class="fa-solid fa-home me-1"></i> Admin Home</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="/account-settings"><i class="fa-solid fa-cog me-1"></i> Account Settings</a></li>
          <li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-door-open me-1"></i> Logout</a></li>
        </ul>
      </li>        
        @endif
        @endauth
      </ul>
    </div>
    <ul class="navbar-nav ml-lg-auto navbar-user-dropdown ml-2 ml-lg-0">
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link {{ request()->is('login', 'register', 'account-settings', 'transaction-history') ? 'navblue fw-bold' : '' }} dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="fa-solid fa-user me-1"></i> {{ auth()->user()->first_name }}
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/transaction-history"><i class="fa-solid fa-sterling-sign me-1"></i> My Transactions</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="/account-settings"><i class="fa-solid fa-cog me-1"></i> Account Settings</a></li>
          <li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-door-open me-1"></i> Logout</a></li>
        </ul>
      </li>
      @else
      <li class="nav-item dropdown">
        <a class="nav-link {{ request()->is('login', 'register') ? 'navblue fw-bold' : '' }} dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="fa-solid fa-user me-1"></i> Account
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/login"><i class="fa-solid fa-right-to-bracket me-1"></i> Login</a></li>
          <li><a class="dropdown-item" href="/register"><i class="fa-solid fa-user-plus me-1"></i> Register</a></li>
        </ul>
      </li>
      @endauth
    </ul>
  </div>
</nav>
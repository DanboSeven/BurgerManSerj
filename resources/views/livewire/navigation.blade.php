<nav class="navbar navbar-dark fixed-top navbar-expand-lg sitenav">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'navblue fw-bold' : '' }}" href="/" >Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('donate') ? 'navblue fw-bold' : '' }}" href="/donate" >Donate</a>
        </li>
      </ul>
    </div>
    <ul class="navbar-nav ml-lg-auto navbar-user-dropdown ml-2 ml-lg-0">
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link {{ request()->is('login', 'register') ? 'navblue fw-bold' : '' }} dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          {{ auth()->user()->first_name }}
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/logout">Logout</a></li>
        </ul>
      </li>
      @else
      <li class="nav-item dropdown">
        <a class="nav-link {{ request()->is('login', 'register') ? 'navblue fw-bold' : '' }} dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Account
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/login">Login</a></li>
          <li><a class="dropdown-item" href="/register">Register</a></li>
        </ul>
      </li>
      @endauth
    </ul>
  </div>
</nav>
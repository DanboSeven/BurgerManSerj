<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-5">
      @if (session()->has('error'))
      <div class="box p-1 mt-4">
      <div class="alert alert-danger mb-0" role="alert">
        {{ session('error') }}
      </div>
      </div>
      @endif
  <div class="box mt-4 p-1">
    <div class="boxinner px-3">
    <div class="text-center mt-3 mb-4">
      <i class="fa-solid fa-user-lock fa-2x mb-2"></i>
      <h4 class="fw-bold">Welcome Back</h4>
      <p class="text-muted small mb-0">Please sign in to your account</p>
    </div>

    <form wire:submit="login">
      <div class="mb-3">
        <label for="email" class="form-label fw-semibold">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="you@example.com" wire:model="email" required>
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
      </div>

      <div class="mb-3">
        <label for="password" class="form-label fw-semibold">Password</label>
        <input type="password" class="form-control" id="password" placeholder="••••••••" wire:model="password" required>
        @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
      </div>

      <div class="d-flex justify-content-between align-items-center mb-1">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="rememberMe" wire:model="remember">
          <label class="form-check-label small" for="rememberMe">
            Remember me
          </label>
        </div>
        <a href="#" class="small text-decoration-none">Forgot password?</a>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn greenbtn">
          <div wire:loading.remove><i class="fa-solid fa-right-to-bracket me-2"></i> Login</div>
              <div class="spinner" wire:loading><i class="fa-solid fa-spinner"></i></div>
        </button>
      </div>
    </form>

    <div class="text-center mt-3">
      <span class="small text-muted">Don't have an account?</span>
      <a href="/register" class="small text-success fw-semibold text-decoration-none">Sign up</a>
    </div>
</div>
  </div>
    </div>
  </div>
</div>
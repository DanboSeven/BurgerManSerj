<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            @if (session()->has('error'))
            <div class="box p-1 mt-4">
                <div class="alert alert-danger mb-0" role="alert">
                    {{ session('error') }}
                </div>
            </div>
            @endif
            <div class="box mt-4 p-1">
                <div class="boxinnerdnu px-3">
                    <div class="text-center mt-3 mb-4">
                        <i class="fa-solid fa-user-plus fa-2x mb-2"></i>
                        <h4 class="fw-bold">Create An Account</h4>
                        <p class="text-muted small mb-0">Please fill in all fields to create your account</p>
                    </div>

                    <form wire:submit="register">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="firstname" class="form-label fw-semibold">First Name</label>
                                <input type="text" class="form-control" id="firstname" placeholder="First Name"
                                    wire:model="firstname" required>
                                @if ($errors->has('firstname'))
                                <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="lastname" class="form-label fw-semibold">Last Name</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Last Name"
                                    wire:model="lastname" required>
                                @if ($errors->has('lastname'))
                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                wire:model="email" required>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label fw-semibold">Location</label>
                            <input type="text" class="form-control" id="location" placeholder="Location"
                                wire:model="location" required>
                            <small>Your location is displayed across the website, you are able to hide this in your user
                                settings</small>
                            @if ($errors->has('location'))
                            <span class="text-danger">{{ $errors->first('location') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="••••••••"
                                wire:model="password" required>
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="passwordconfirmation" class="form-label fw-semibold">Confirm Password</label>
                            <input type="password" class="form-control" id="passwordconfirmation" placeholder="••••••••"
                                wire:model="password_confirmation" required>
                        </div>

                        <div class="mb-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Terms" wire:model="terms">
                                <label class="form-check-label small" for="Terms">
                                    I agree to the <b>Terms & Conditions</b>
                                </label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn greenbtn">
                                <div wire:loading.remove><i class="fa-solid fa-user-plus me-2"></i> Register</div>
                                <div class="spinner" wire:loading><i class="fa-solid fa-spinner"></i></div>
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <span class="small text-muted">Already have an account?</span>
                        <a href="/login" class="small text-success fw-semibold text-decoration-none">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
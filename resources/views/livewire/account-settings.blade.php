<div class="container mt-4">
    <ul class="nav nav-pills mb-4 justify-content-center" id="settingsTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link @if($emailActive) active @endif" id="email-tab" data-bs-toggle="pill" data-bs-target="#email" type="button"
                role="tab">
                <i class="fas fa-user me-1"></i> Email
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link @if($passwordActive) active @endif" id="password-tab" data-bs-toggle="pill" data-bs-target="#password" type="button"
                role="tab">
                <i class="fas fa-lock me-1"></i> Password
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link @if($privacyActive) active @endif" id="privacy-tab" data-bs-toggle="pill" data-bs-target="#privacy" type="button"
                role="tab">
                <i class="fas fa-cog me-1"></i> Privacy
            </button>
        </li>
    </ul>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="tab-content" id="settingsTabContent">
                <div class="tab-pane fade @if($emailActive) show active @endif" id="email" role="tabpanel">
                    <div class="boxheader"><i class="fas fa-envelope me-1"></i> Update Email Address</div>
                    <div class="box p-3">
                        Your email address is a key part of your account. It's used both to log in securely and for us
                        to send important updates<br />
                        Keeping your email address up to date ensures you don't miss anything important and helps keep
                        your account secure.<br />
                        If you change your email, make sure it's one you have regular access to.<br />
                        If you no longer use the email currently linked to your account, please update it below.

                        @if (session()->has('success_email'))
                        <div class="alert alert-success mt-3 mb-3" role="alert">
                            {{ session('success_email') }}
                        </div>
                        @endif
                        <form class="mt-3" wire:submit="changeEmail">
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" placeholder="{{ $email }}" wire:model="email" required>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn greenbtn mt-0"><i class="fas fa-envelope me-1"></i> Update Email Address</button>
                        </form>
                    </div>
                </div>


                <div class="tab-pane fade @if($passwordActive) show active @endif" id="password" role="tabpanel">
                    <div class="boxheader"><i class="fas fa-key me-1"></i> Change Your Password</div>
                    <div class="box p-3">
                        @if (session()->has('error_pw'))
                        <div class="alert alert-danger mb-3" role="alert">
                            {{ session('error_pw') }}
                        </div>
                        @endif
                        @if (session()->has('success_pw'))
                        <div class="alert alert-success mb-3" role="alert">
                            {{ session('success_pw') }}
                        </div>
                        @endif
                        <form wire:submit="changePassword">
                            <div class="mb-3">
                                <label for="current_password" class="form-label fw-semibold">Current Password</label>
                                <input type="password" class="form-control" id="current_password" placeholder="••••••••" wire:model="current_password" required>
                                @if ($errors->has('current_password'))
                                <span class="text-danger">{{ $errors->first('current_password') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">New Password</label>
                                <input type="password" class="form-control" id="password" placeholder="••••••••" wire:model="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label fw-semibold">Confirm New Password</label>
                                <input type="password" class="form-control" id="password_confirmation" placeholder="••••••••" wire:model="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn greenbtn mt-0"><i class="fas fa-key me-1"></i> Update Password</button>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade @if($privacyActive) show active @endif" id="privacy" role="tabpanel">
                    <div class="boxheader"><i class="fas fa-cog me-1"></i> Privacy Settings</div>
                    <div class="box p-3">
                        @if (session()->has('success_privacy'))
                        <div class="alert alert-success mb-3" role="alert">
                            {{ session('success_privacy') }}
                        </div>
                        @endif
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="hideName" wire:model.live="ToggleHideName" @if ($ToggleHideName) checked @endif>
                                <label class="form-check-label" for="hideName">Hide Full Name
                                    <small class="text-muted d-block">Removes your last name from public views</small>
                                </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="hideLocation" wire:model.live="ToggleHideLocation" @if ($ToggleHideLocation) checked @endif>
                                <label class="form-check-label" for="hideLocation">Hide Location
                                    <small class="text-muted d-block">Your location won't be shown across the website</small>
                                </label>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
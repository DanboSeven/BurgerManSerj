<div class="container mt-4">
    <ul class="nav nav-pills mb-4 justify-content-center" id="settingsTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="email-tab" data-bs-toggle="pill" data-bs-target="#email" type="button"
                role="tab">
                <i class="fas fa-user me-1"></i> Email
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="password-tab" data-bs-toggle="pill" data-bs-target="#password" type="button"
                role="tab">
                <i class="fas fa-lock me-1"></i> Password
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="privacy-tab" data-bs-toggle="pill" data-bs-target="#privacy" type="button"
                role="tab">
                <i class="fas fa-cog me-1"></i> Privacy
            </button>
        </li>
    </ul>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="tab-content" id="settingsTabContent">
                <div class="tab-pane fade show active" id="email" role="tabpanel">
                    <div class="boxheader"><i class="fas fa-envelope me-1"></i> Update Email Address</div>
                    <div class="box p-3">
                        Your email address is a key part of your account. It's used both to log in securely and for us
                        to send important updates<br />
                        Keeping your email address up to date ensures you don't miss anything important and helps keep
                        your account secure.<br />
                        If you change your email, make sure it's one you have regular access to.<br />
                        If you no longer use the email currently linked to your account, please update it below.
                        <form class="mt-3">
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" placeholder="{{ auth()->user()->email }}">
                            </div>
                            <button type="submit" class="btn greenbtn mt-0"><i class="fas fa-envelope me-1"></i> Update
                                Email</button>
                        </form>
                    </div>
                </div>


                <div class="tab-pane fade" id="password" role="tabpanel">
                    <div class="boxheader"><i class="fas fa-key me-1"></i> Change Your Password</div>
                    <div class="box p-3">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" placeholder="{{ auth()->user()->email }}">
                            </div>
                            <button type="submit" class="btn greenbtn mt-0"><i class="fas fa-envelope me-1"></i> Update
                                Email</button>
                        </form>
                    </div>
                </div>


                <div class="tab-pane fade" id="privacy" role="tabpanel">
                    <div class="boxheader"><i class="fas fa-cog me-1"></i> Privacy Settings</div>
                    <div class="box p-3">
                        <form>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="hideName">
                <label class="form-check-label" for="hideName">
                    Hide Full Name <small class="text-muted d-block">Removes your last name from public views</small>
                </label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="hideLocation">
                <label class="form-check-label" for="hideLocation">
                    Hide Location <small class="text-muted d-block">Your location won't be shown on your profile</small>
                </label>
            </div>
            <button type="submit" class="btn greenbtn mt-0">
                <i class="fas fa-envelope me-1"></i> Save Preferences
            </button>
        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
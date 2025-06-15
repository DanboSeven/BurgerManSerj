<div class="container mt-4">
    <ul class="nav nav-pills mb-4 justify-content-center" id="settingsTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="email-tab" data-bs-toggle="pill" data-bs-target="#email"
            type="button" role="tab">
            <i class="fas fa-user me-1"></i> Email
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="password-tab" data-bs-toggle="pill" data-bs-target="#password"
            type="button" role="tab">
            <i class="fas fa-lock me-1"></i> Password
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="preferences-tab" data-bs-toggle="pill" data-bs-target="#preferences"
            type="button" role="tab">
            <i class="fas fa-cog me-1"></i> Privacy
          </button>
        </li>
      </ul>


  <div class="box p-3">
    <div class="boxinnerf">
      <div class="tab-content" id="settingsTabContent">
        <div class="tab-pane fade show active" id="email" role="tabpanel">
          <form>
            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control" placeholder="{{ auth()->user()->email }}">
            </div>
            <button type="submit" class="btn greenbtn mt-0"><i class="fas fa-envelope me-1"></i> Save Email</button>
          </form>
        </div>

        <!-- Password Tab -->
        <div class="tab-pane fade" id="password" role="tabpanel">
          <form>
            <div class="mb-3">
              <label class="form-label">Current Password</label>
              <input type="password" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">New Password</label>
              <input type="password" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Confirm New Password</label>
              <input type="password" class="form-control">
            </div>
            <button type="submit" class="btn greenbtn mt-0"><i class="fas fa-key me-1"></i> Update Password</button>
          </form>
        </div>

        <!-- Preferences Tab -->
        <div class="tab-pane fade" id="preferences" role="tabpanel">
          <form>
            <div class="boxinner p-2">
            <div class="form-check form-switch" style="min-height: 19px;">
                <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
                <label class="form-check-label" for="switchCheckDefault">Hide Full Name <small>(This setting will remove your last name from the website)</small></label>
            </div>
            </div>
            <div class="boxinner p-2 mt-2 mb-3">
            <div class="form-check form-switch" style="min-height: 19px;">
                <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
                <label class="form-check-label" for="switchCheckDefault">Hide Location <small>(This setting will hide your location on the website)</small></label>
            </div>
            </div>
            <button type="submit" class="btn greenbtn mt-0"><i class="fas fa-check me-1"></i> Save Preferences</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

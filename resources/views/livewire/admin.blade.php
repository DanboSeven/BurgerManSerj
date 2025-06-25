<div class="container mt-4">
    <div class="row">
        <div class="col-lg-4">
            <div class="boxheader">
                <i class="fa-solid fa-chart-line me-1"></i> Recent User Activity
            </div>
            <div class="box p-1">
                <div class="boxinner">
                    <ul class="list-group list-group-flush">
                        @forelse ($recentUserActivity as $userActivity)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div>
                                    <strong>{{ $userActivity->first_name . ' ' . $userActivity->last_name
                                        }}</strong><br>
                                    <small class="text-muted">{{ $userActivity->email }}</small><br />
                                    <small class="text-muted">{{ $userActivity->location }}</small>
                                </div>
                            </div>
                            <span class="badge rank"><i class="fa-solid fa-clock me-1"></i> {{
                                $userActivity->last_activity->format('d/m/Y H:i') }}</span>
                        </li>
                        @empty
                        <div class="alert alert-danger mb-0" role="alert">
                            No data available
                        </div>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="boxheader">
                <i class="fa-solid fa-user me-1"></i> Recent Created Accounts
            </div>
            <div class="box p-1">
                <div class="boxinner">
                    <ul class="list-group list-group-flush">
                        @forelse ($recentCreatedAccounts as $recentCreated)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div>
                                    <strong>{{ $recentCreated->first_name . ' ' . $recentCreated->last_name
                                        }}</strong><br>
                                    <small class="text-muted">{{ $recentCreated->email }}</small><br />
                                    <small class="text-muted">{{ $recentCreated->location }}</small>
                                </div>
                            </div>
                            <span class="badge rank"><i class="fa-solid fa-clock me-1"></i> {{
                                $recentCreated->created_at->format('d/m/Y H:i') }}</span>
                        </li>
                        @empty
                        <div class="alert alert-danger mb-0" role="alert">
                            No data available
                        </div>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="boxheader">
                <i class="fa-solid fa-cog me-1"></i> Staff Accounts
            </div>
            <div class="box p-1">
                <div class="boxinner">
                    <ul class="list-group list-group-flush">
                        @forelse ($staffAccounts as $staff)
                        @php
                        $permissionLabels = [
                        '2' => ['label' => 'Mod', 'color' => 'primary'],
                        '3' => ['label' => 'Admin', 'color' => 'danger'],
                        ];
                        @endphp
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div>
                                    <strong>{{ $staff->first_name . ' ' . $staff->last_name }}</strong><br>
                                    <small class="text-muted">{{ $staff->email }}</small><br />
                                    @foreach ($staff->permissions as $p)
                                    @if ($p !== '1')
                                    @php
                                    $label = $permissionLabels[$p]['label'] ?? 'Unknown';
                                    $color = $permissionLabels[$p]['color'] ?? 'dark';
                                    @endphp
                                    <span class="badge bg-{{ $color }} me-1">{{ $label }}</span>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <span class="badge rank"><i class="fa-solid fa-clock me-1"></i> {{
                                $staff->created_at->format('d/m/Y H:i') }}</span>
                        </li>
                        @empty
                        <div class="alert alert-danger mb-0" role="alert">
                            No data available
                        </div>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
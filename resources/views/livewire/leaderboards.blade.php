<div class="container mt-4">
    <livewire:header-stats />

    @if ($totalPages > 1)
    <div class="custom-pagination">
        {{-- Previous Page Link --}}
        <button class="page-btn {{ $currentPage == 1 ? 'disabled' : '' }}"
            wire:click="$set('page', {{ $currentPage - 1 }})" @disabled($currentPage==1)>
            <i class="fa-solid fa-angles-left"></i>
        </button>

        {{-- Page Numbers --}}
        @for ($i = 1; $i <= $totalPages; $i++) <button class="page-btn {{ $currentPage == $i ? 'active' : '' }}"
            wire:click="$set('page', {{ $i }})">
            {{ $i }}
            </button>
            @endfor

            {{-- Next Page Link --}}
            <button class="page-btn {{ $currentPage == $totalPages ? 'disabled' : '' }}"
                wire:click="$set('page', {{ $currentPage + 1 }})" @disabled($currentPage==$totalPages)>
                <i class="fa-solid fa-angles-right"></i>
            </button>
    </div>
    @endif

    <div class="boxheader">
        <i class="fa-solid fa-chart-simple me-1"></i> Meal Leaderboards
    </div>
    <div class="box p-1">
        @if ($loggedInUser && $userRank)
        <div class="boxinner mb-1">
            <strong><i class="fa-solid fa-user me-1"></i> {{ $loggedInUser->first_name }}</strong>, you are currently
            ranked <span class="badge leaderboard-rank">#{{ $userRank }}</span> on the leaderboard with
            <strong>{{ $loggedInUser->meals_donated }}</strong> meals donated
        </div>
        @endif
        <div class="boxinner" style="padding:0px;">
            <ul class="list-group list-group-flush">
                @forelse ($users as $index => $user)
                @auth
                <li
                    class="list-group-item d-flex justify-content-between align-items-center {{ $user->id === $loggedInUser->id ? 'myleaderboard' : '' }}">
                    @else
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    @endauth
                    <div class="d-flex align-items-center">
                        <span class="badge leaderboard-rank-number me-3" style="width: 2.2rem;height:2.2rem;">
                            {{ $startRank + $index }}
                        </span>
                        <div>
                            <strong>
                                @if ($user->hide_full_name)
                                <i class="fa-solid fa-user me-1"></i> {{ $user->first_name }}
                                @else
                                <i class="fa-solid fa-user me-1"></i> {{ $user->first_name . ' ' . $user->last_name }}
                                @endif
                            </strong><br>
                            <small class="text-muted">
                                @if ($user->hide_location)
                                <i class="fa-solid fa-location-dot me-1"></i> <i>Hidden Location</i>
                                @else
                                <i class="fa-solid fa-location-dot me-1"></i> {{ $user->location }}
                                @endif
                            </small>
                        </div>
                    </div>
                    <span class="badge leaderboard-rank"><i class="fa-solid fa-burger me-1"></i> {{ $user->meals_donated
                        }} Meals</span>
                </li>
                @empty
                <div class="alert alert-warning mb-0" role="alert">
                    <i class="fa-solid fa-burger me-1"></i> Leaderboard Empty
                </div>
                @endforelse
            </ul>

        </div>
    </div>

    @if ($totalPages > 1)
    <div class="custom-pagination mb-4">
        {{-- Previous Page Link --}}
        <button class="page-btn {{ $currentPage == 1 ? 'disabled' : '' }}"
            wire:click="$set('page', {{ $currentPage - 1 }})" @disabled($currentPage==1)>
            <i class="fa-solid fa-angles-left"></i>
        </button>

        {{-- Page Numbers --}}
        @for ($i = 1; $i <= $totalPages; $i++) <button class="page-btn {{ $currentPage == $i ? 'active' : '' }}"
            wire:click="$set('page', {{ $i }})">
            {{ $i }}
            </button>
            @endfor

            {{-- Next Page Link --}}
            <button class="page-btn {{ $currentPage == $totalPages ? 'disabled' : '' }}"
                wire:click="$set('page', {{ $currentPage + 1 }})" @disabled($currentPage==$totalPages)>
                <i class="fa-solid fa-angles-right"></i>
            </button>
    </div>
    @endif




</div>
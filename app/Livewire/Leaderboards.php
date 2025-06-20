<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Leaderboards extends Component
{
    public $page = 1;
    public $perPage = 20;

    #[On('pageChanged')]
    public function updatePage($newPage)
    {
        $this->page = $newPage;
    }

    protected $queryString = ['page'];

    public function render()
    {
        // Get total count (can cache if you want)
        $totalCount = Cache::remember('leaderboard_total_count', now()->addSeconds(300), function () {
            return User::where('meals_donated', '>=', 1)->count();
        });

        $totalPages = max(1, ceil($totalCount / $this->perPage));

        // Validate page number
        if (!is_numeric($this->page) || $this->page < 1) {
            $this->page = 1;
        } elseif ($this->page > $totalPages) {
            $this->page = $totalPages;
        }

        // Cache key per page
        $cacheKey = "leaderboard_page_{$this->page}";

        // Get paginated data per page
        $users = Cache::remember($cacheKey, now()->addSeconds(300), function () {
            return User::where('meals_donated', '>=', 1)
                ->orderByDesc('meals_donated')
                ->skip(($this->page - 1) * $this->perPage)
                ->take($this->perPage)
                ->get();
        });

        $userRank = null;
        $loggedInUser = Auth::user();

        if ($loggedInUser) {
            if ($loggedInUser->meals_donated >= '1') {
            $userRank = Cache::remember("user_rank_{$loggedInUser->id}", now()->addSeconds(300), function () use ($loggedInUser) {
                return User::where('meals_donated', '>=', 1)->where('meals_donated', '>', $loggedInUser->meals_donated)->count() + 1;
            });
            }
        }

        return view('livewire.leaderboards', [
            'users' => $users,
            'totalPages' => $totalPages,
            'currentPage' => $this->page,
            'startRank' => ($this->page - 1) * $this->perPage + 1,
            'userRank' => $userRank,
            'loggedInUser' => $loggedInUser,
        ])->title('Burgerman Serj - Leaderboards');
    }
}

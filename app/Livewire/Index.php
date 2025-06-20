<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

use App\Models\Donation;
use App\Models\MealsOut;
use App\Models\User;

class Index extends Component
{
    public $recentDonations = [];
    public $donationLeaderboards = [];
    public $registeredUsers = 0;
    public $todayUsers = 0;
    public $mealsReceived = 0;
    public $mealsReceivedThisWeek = 0;
    public $mealsOut = 0;
    public $mealsOutThisWeek = 0;

    public function mount()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // UNCACHED
        $this->registeredUsers = User::count();

        // CACHED
        $this->donationLeaderboards = Cache::remember('donation_leaderboards', now()->addSeconds(90), function () {
            return User::where('meals_donated', '>=', 1)->orderByDesc('meals_donated')->take(5)->get();
        });
        $this->recentDonations = Cache::remember('recent_donations', now()->addSeconds(90), function () {
            return Donation::with('user')->where('status', 'COMPLETED')->latest()->take(5)->get();
        });
        $this->todayUsers = Cache::remember('today_users', now()->addSeconds(90), function () {
            return User::where('created_at', '>=', Carbon::now()->subDay())->count();
        });
        $this->mealsReceived = Cache::remember('meals_received', now()->addSeconds(90), function () {
            return Donation::where('status', 'COMPLETED')->sum('quantity');
        });
        $this->mealsReceivedThisWeek = Cache::remember('meals_received_thisweek', now()->addSeconds(90), function () use ($startOfWeek, $endOfWeek) {
            return Donation::where('status', 'COMPLETED')->whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('quantity');
        });
        $this->mealsOut = Cache::remember('meals_out', now()->addSeconds(90), function () {
            return MealsOut::sum('quantity');
        });
        $this->mealsOutThisWeek = Cache::remember('meals_out_thisweek', now()->addSeconds(90), function () use ($startOfWeek, $endOfWeek) {
            return MealsOut::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('quantity');
        });
    }

    public function render()
    {
        return view('livewire.index')->title('Burgerman Serj - Home');
    }
}

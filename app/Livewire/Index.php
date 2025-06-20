<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;

use App\Models\Donation;
use App\Models\MealsOut;
use App\Models\User;

class Index extends Component
{
    public $recentDonations = [];
    public $donationLeaderboards = [];

    public function mount()
    {
        $this->donationLeaderboards = Cache::remember('donation_leaderboards', now()->addSeconds(90), function () {
            return User::where('meals_donated', '>=', 1)->orderByDesc('meals_donated')->take(5)->get();
        });
        $this->recentDonations = Cache::remember('recent_donations', now()->addSeconds(90), function () {
            return Donation::with('user')->where('status', 'COMPLETED')->latest()->take(5)->get();
        });
    }

    public function render()
    {
        return view('livewire.index')->title('Burgerman Serj - Home');
    }
}

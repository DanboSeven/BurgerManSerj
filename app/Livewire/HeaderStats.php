<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Cache;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Donation;
use App\Models\MealsOut;

class HeaderStats extends Component
{
    public $registeredUsers = 0;
    public $weekUsers = 0;
    public $mealsReceived = 0;
    public $mealsReceivedThisWeek = 0;
    public $mealsOut = 0;
    public $mealsOutThisWeek = 0;

    public function mount()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $this->registeredUsers = User::count();
        $this->weekUsers = Cache::remember('week_users', now()->addSeconds(90), function () use ($startOfWeek, $endOfWeek) {
            return User::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
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
        return view('livewire.header-stats');
    }
}

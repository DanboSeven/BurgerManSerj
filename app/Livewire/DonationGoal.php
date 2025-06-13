<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DonationGoalDB;
use Illuminate\Support\Facades\Cache;

class DonationGoal extends Component
{
    public $goal = [];

    public function mount()
    {
        $this->goal = Cache::remember('donation_goal', now()->addSeconds(30), function () {
            return DonationGoalDB::latest('id')->first();
        });
    }

    public function render()
    {
        return view('livewire.donation-goal');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Donation;

class Index extends Component
{
    public $recentDonations = [];

    public function mount()
    {
        //$this->recentDonations = Donation::latest('id')->take(5)->get();
        $this->recentDonations = Donation::with('user')->latest()->take(5)->get();
    }

    public function render()
    {
        return view('livewire.index')->title('Burgerman Serj - Home');
    }
}

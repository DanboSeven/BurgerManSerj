<?php

namespace App\Livewire;

use Livewire\Component;

class Admin extends Component
{
    public function mount()
    {
        if (!auth()->user()->hasPermission(['2', '3'])) {
            return redirect()->route('errors.403');
        }
    }
    
    public function render()
    {
        return view('livewire.admin');
    }
}

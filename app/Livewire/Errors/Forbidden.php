<?php

namespace App\Livewire\Errors;

use Livewire\Component;

class Forbidden extends Component
{
    public function render()
    {
        return view('livewire.errors.forbidden');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function mount()
    {
    Auth::logout();
    $this->redirect('/login');
    }
}
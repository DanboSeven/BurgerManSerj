<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class ManageUsers extends Component
{
    public function mount()
    {
        if (!auth()->user()->hasPermission(['2', '3'])) {
            abort(403, 'This area is restricted to authorised users only.');
        }
    }

    public function render()
    {
        return view('livewire.admin.manage-users');
    }
}

<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;

class Admin extends Component
{
    public $recentUserActivity = [];
    public $recentCreatedAccounts = [];
    public $staffAccounts = [];

    public function mount()
    {
        if (!auth()->user()->hasPermission(['2', '3'])) {
            abort(403, 'Unauthorized');
        }

        $this->recentUserActivity = User::where('last_activity', '>=', Carbon::now()->subHours(12))->where('id', '!=', auth()->id())->orderByDesc('last_activity')->take(10)->get();
        $this->recentCreatedAccounts = User::where('created_at', '>=', Carbon::now()->subHours(12))->orderByDesc('created_at')->take(10)->get();
        $this->staffAccounts = User::where(function ($query) {
            $query->whereJsonContains('permissions', '2')->orWhereJsonContains('permissions', '3');})->get();
    }
    
    public function render()
    {
        return view('livewire.admin.admin')->title('Burgerman Serj - Admin');
    }
}

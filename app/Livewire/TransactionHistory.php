<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class TransactionHistory extends Component
{
    public $page = 1;
    public $perPage = 10;

    #[On('pageChanged')]
    public function updatePage($newPage)
    {
        $this->page = $newPage;
    }

    protected $queryString = ['page'];

    public function render()
    {
        $totalCount = Donation::where('user_id', Auth::id())->count();
        $totalPages = max(1, ceil($totalCount / $this->perPage));

        // Validate page number
        if (!is_numeric($this->page) || $this->page < 1) {
            $this->page = 1;
        } elseif ($this->page > $totalPages) {
            $this->page = $totalPages;
        }

        $transactions = Donation::where('user_id', Auth::id())->orderByDesc('id')->skip(($this->page - 1) * $this->perPage)->take($this->perPage)->get();

        return view('livewire.transaction-history', [
            'transactions' => $transactions,
            'totalPages' => $totalPages,
            'currentPage' => $this->page,
        ])->title('Burgerman Serj - Transactions');
    }
}

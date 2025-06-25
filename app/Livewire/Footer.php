<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class Footer extends Component
{
    public $loggedIn = 0;
    public $guests = 0;
    public $total = 0;

    public function mount()
    {
        $cacheKey = 'user_sessions_last_hour_counts';
        $counts = Cache::remember($cacheKey, now()->addSeconds(60), function () {
            $oneHourAgo = Carbon::now()->subHour()->timestamp;
            $loggedIn = DB::table('sessions')->whereNotNull('user_id')->where('last_activity', '>=', $oneHourAgo)->count();
            $guests = DB::table('sessions')->whereNull('user_id')->where('last_activity', '>=', $oneHourAgo)->count();
            return [
                'loggedIn' => $loggedIn,
                'guests' => $guests,
                'total' => $loggedIn + $guests,
            ];
        });

        $this->loggedIn = $counts['loggedIn'];
        $this->guests = $counts['guests'];
        $this->total = $counts['total'];
    }

    public function render()
    {
        return view('livewire.footer');
    }
}

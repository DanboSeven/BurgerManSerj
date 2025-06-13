<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationGoalDB extends Model
{
    protected $table = 'donation_goal';
    protected $fillable = [
        'donated',
        'goal',
        'active',
    ];
}

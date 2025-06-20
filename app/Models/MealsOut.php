<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealsOut extends Model
{
    protected $table = 'meals_out';
    protected $fillable = [
        'quantity',
    ];
}

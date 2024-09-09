<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use HasFactory;

    protected $fillable = [
        'weekly_pick_id',
        'points',
        'bets',
        'bet_amount',
        'win_amount',
    ];

    public function weeklyPick()
    {
        return $this->belongsTo(WeeklyPick::class);
    }
}

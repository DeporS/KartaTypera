<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyPickTemplate extends Model
{
    use HasFactory;

    public function weeklyBets(){
        return $this->hasMany(WeeklyBet::class);
    }
}

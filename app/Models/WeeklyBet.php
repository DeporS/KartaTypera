<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyBet extends Model
{
    use HasFactory;

    public function week(){
        return $this->belongsTo(WeeklyPickTemplate::class);
    }
}

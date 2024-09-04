<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Head2Head extends Model
{
    use HasFactory;

    public function weeklyPick()
    {
        return $this->belongsTo(WeeklyPick::class);
    }
}

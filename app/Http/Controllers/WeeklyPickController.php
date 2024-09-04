<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class WeeklyPickController extends Controller
{
    public function show(): View
    {
        return view('weeklyPick');
    }

    public function store() 
    {
        
    }
}

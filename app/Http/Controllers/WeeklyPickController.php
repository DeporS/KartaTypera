<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\WeeklyPickTemplate;
use App\Models\WeeklyBet;

class WeeklyPickController extends Controller
{
    public function show()
    {   
        $id = 4;
        
        $weeklyPickTemplate = WeeklyPickTemplate::findOrFail($id);

        $teams = json_decode($weeklyPickTemplate->teams, true);
        $riders =json_decode($weeklyPickTemplate->riders, true);
        $h2hs = json_decode($weeklyPickTemplate->h2hs, true);

        $weeklyBets = WeeklyBet::where('weekly_pick_template_id', $id)->get();
        $betTexts = [];
        $oddYes = [];
        $oddNo = [];

        foreach ($weeklyBets as $bet) {
            $betTexts[] = $bet->bet_text;
            $oddYes[] = $bet->odd_yes;
            $oddNo[] = $bet->odd_no;
        }

        return view('weeklyPick', [
            'teams' => $teams,
            'riders' => $riders,
            'h2hs' => $h2hs,
            'betText' => $betTexts,
            'oddYes' => $oddYes,
            'oddNo' => $oddNo,
        ]);
    }

    public function store(Request $request) 
    {
        // wynik
        if(($request->input('home') + $request->input('away')) != 90)
        {
            return redirect()->back()->withErrors(['total' => 'Suma punktów gospodarzy i gości musi być równa 90'])->withInput();
        }

        // punkty zawodnikow
        $sum_home = $request->input('home1') + $request->input('home2') + $request->input('home3') + $request->input('home4') + $request->input('home5') + $request->input('home6') + $request->input('home7') + $request->input('home8');
        $sum_away = $request->input('away1') + $request->input('away2') + $request->input('away3') + $request->input('away4') + $request->input('away5') + $request->input('away6') + $request->input('away7') + $request->input('away8');

        if($request->input('home') != $sum_home){
            return redirect()->back()->withErrors(['home_total' => 'Suma punktów zawodników gospodarzy musi być równa twojej predykcji wyniku'])->withInput();
        }

        if($request->input('away') != $sum_away){
            return redirect()->back()->withErrors(['away_total' => 'Suma punktów zawodników gości musi być równa twojej predykcji wyniku'])->withInput();
        }
    }
}

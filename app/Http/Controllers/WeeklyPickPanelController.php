<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeeklyPickTemplate;
use App\Models\WeeklyBet;

class WeeklyPickPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("weeklyPickPanel");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(($request->input('odd1a') < 1.00 || $request->input('odd1b')) < 1.00)
        {
            return redirect()->back()->withErrors(['betodds' => 'Kurs nie może być mniejszy od 1.00'])->withInput();
        }

        $week = $request->input("week");

        $date = $request->input("date");
        $time = $request->input("time");
        $closesAt = $date . ' ' . $time;

        $teams = [$request->input('home'), $request->input('away')];
        
        $riders = [];

        for($i=1; $i <= 8; $i++){
            $rider = $request->input("rider{$i}a");
            if($rider != null){
                $riders[] = $rider;
            }
        }

        for($i=1; $i <= 8; $i++){
            $rider = $request->input("rider{$i}b");
            if($rider != null){
                $riders[] = $rider;
            }
        }

        $head2head = [];

        for($i=1; $i <= 5; $i++){
            $header = $request->input("head2head{$i}a");
            if ($header != null){
                $head2head[] = $riders[$header - 1];
            }
        }

        for($i=1; $i <= 5; $i++){
            $header = $request->input("head2head{$i}b");
            if ($header != null){
                $head2head[] = $riders[$header + 7];
            }
        }

        // template
        $weeklyPickTemplate = WeeklyPickTemplate::create([
            'teams' => json_encode($teams),
            'riders' => json_encode($riders),
            'h2hs' => json_encode($head2head),
            'week' => $week,
            'closes_at' => $closesAt,
        ]);

        // bety fioletowe
        for ($i = 1; $i <=5; $i++){
            WeeklyBet::create([
                'weekly_pick_template_id' => $weeklyPickTemplate->id,
                'bet_text' => $request->input("bet{$i}"),
                'odd_yes' => $request->input("odd{$i}a"),
                'odd_no' => $request->input("odd{$i}b"),
                'bet_type' => 'purple',
            ]);
        }
        
        // bety bezowe
        for ($i = 6; $i <=8; $i++){
            WeeklyBet::create([
                'weekly_pick_template_id' => $weeklyPickTemplate->id,
                'bet_text' => $request->input("bet{$i}"),
                'odd_yes' => $request->input("odd{$i}a"),
                'odd_no' => $request->input("odd{$i}b"),
                'bet_type' => 'beige',
            ]);
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

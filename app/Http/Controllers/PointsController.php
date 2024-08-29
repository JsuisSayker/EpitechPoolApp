<?php

namespace App\Http\Controllers;

use App\Models\Points;
use App\Charts\TeamsPointChart;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    public function index(TeamsPointChart $chart)
    {
        return view('points.index', ['chart' => $chart->build()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'teams_id' => ['required'],
            'point' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);

        Points::create([
            'teams_id' => request('team_id'),
            'name' => request('name'),
            'description' => request('description')
        ]);

        return redirect('/teams');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Points;
use App\Charts\TeamsPointChart;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PointsController extends Controller
{
    public function index(TeamsPointChart $chart): View
    {
        return view('points.index', ['chart' => $chart->build()]);
    }

    public function create(Request $request): View
    {
        $request->validate([
            'teams_id' => ['required']
        ]);
        return view('points.create', ['teams_id' => request('teams_id')]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'teams_id' => ['required'],
            'point' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);

        Points::create([
            'teams_id' => request('teams_id'),
            'point' => request('point'),
            'description' => request('description')
        ]);

        return redirect('/teams');
    }

    public function edit(Points $point): View
    {
        return view('points.edit', ['point' => $point]);
    }

    public function update(Points $point): RedirectResponse
    {
        // authorize (On hold ...)
        request()->validate([
            'point' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);

        $point->update([
            'point' => request('point'),
            'description' => request('description')
        ]);

        return redirect("/teams/{$point->teams_id}");
    }

    public function destroy(Points $points): RedirectResponse
    {
        $points->delete();

        return redirect("/teams");
    }

    public function addAllPointNTime(Points $points, Int $point): Int
    {
        $points->point += $point;
        return 1;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Points;
use App\Charts\TeamsPointChart;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PointsController extends Controller
{
    public function index(TeamsPointChart $chart): View
    {
        return view('points.index', ['chart' => $chart->build()]);
    }

    public function create(Request $request): View
    {
        $request->validate([
            'teams_id' => ['required', 'exists:teams,id']
        ]);
        return view('points.create', ['teams_id' => request('teams_id')]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'teams_id' => ['required', 'exists:teams,id'],
            'point' => ['required', 'integer'],
            'description' => ['required', 'min:3']
        ]);

        $return = Points::create([
            'teams_id' => request('teams_id'),
            'point' => request('point'),
            'description' => request('description')
        ]);

        if (!$return) {
            throw new \Exception('Could not create the point');
        }

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
            'point' => ['required', 'integer'],
            'description' => ['required', 'min:3']
        ]);

        $return = $point->update([
            'point' => request('point'),
            'description' => request('description')
        ]);

        if (!$return) {
            throw new \Exception('Could not update the point');
        }

        return redirect("/teams/{$point->teams_id}");
    }

    public function destroy(Points $point): RedirectResponse
    {
        $return = $point->delete();

        if (!$return) {
            throw new \Exception('Could not delete the point');
        }

        return redirect("/teams/{$point->teams_id}");
    }
}

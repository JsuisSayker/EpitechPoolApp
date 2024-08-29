<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use App\Models\Points;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Teams::all();

        return view(
            'teams.index',
            [
                'teams' => $teams
            ]
        );
    }

    public function create()
    {
        return view('teams.create');
    }

    public function show(Teams $team)
    {
        return view('teams.show', ['team' => $team, 'points' => $team->points()->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3']
        ]);

        Teams::create([
            'name' => request('name')
        ]);

        return redirect('/teams');
    }

    public function edit(Teams $team)
    {
        return view('teams.edit', ['team' => $team]);
    }

    public function update(Teams $team)
    {
        // authorize (On hold ...)
        request()->validate([
            'name' => ['required', 'min:3'],
            'point' => ['required']
        ]);

        $team->update([
            'name' => request('name')
        ]);

        if (request('point') != $team->points()->get()->last()->point) {
            request()->validate([
                'point' => ['required'],
                'description' => ['required']
            ]);
            Points::create([
                'teams_id' => $team->id,
                'point' => request('point'),
                'description' => request('description')
            ]);
        }

        return redirect("/teams/{$team->id}");
    }

    public function destroy(Teams $team)
    {
        // authorize (On hold ...)

        $team->delete();

        return redirect("/teams");
    }
}

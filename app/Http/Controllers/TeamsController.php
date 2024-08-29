<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use App\Models\Points;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::guest()) {
            return redirect('/login');
        }

        return view('teams.create');
    }

    public function show(Teams $team)
    {
        return view('teams.show', ['team' => $team, 'points' => $team->points()->get()]);
    }

    public function store(Request $request)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

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
        if (Auth::guest()) {
            return redirect('/login');
        }

        return view('teams.edit', ['team' => $team]);
    }

    public function update(Teams $team)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        request()->validate([
            'name' => ['required', 'min:3']
        ]);

        $team->update([
            'name' => request('name')
        ]);

        return redirect("/teams/{$team->id}");
    }

    public function destroy(Teams $team)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        $team->delete();

        return redirect("/teams");
    }
}

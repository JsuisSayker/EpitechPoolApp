<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use Illuminate\Http\Request;
use Pest\Support\Arr;
use PhpParser\Node\Expr\Cast\Array_;

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
            'name' => ['required', 'min:3']
        ]);


        $team->update([
            'name' => request('name')
        ]);

        return redirect("/teams/{$team->id}");
    }

    public function destroy(Teams $team)
    {
        // authorize (On hold ...)

        $team->delete();

        return redirect("/teams");
    }
}

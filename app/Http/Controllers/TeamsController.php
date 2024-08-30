<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index(): View
    {
        $teams = Teams::all();

        return view(
            'teams.index',
            [
                'teams' => $teams
            ]
        );
    }

    public function create(): View
    {
        // if (Auth::guest()) {
        //     return redirect('/login');
        // }

        return view('teams.create');
    }

    public function show(Teams $team): View
    {
        return view('teams.show', [
            'team' => $team,
            'points' => $team->points()->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        // if (Auth::guest()) {
        //     return redirect('/login');
        // }

        $request->validate([
            'name' => ['required', 'min:3']
        ]);

        Teams::create([
            'name' => request('name')
        ]);

        return redirect('/teams');
    }

    public function edit(Teams $team): View
    {
        // if (Auth::guest()) {
        //     return redirect('/login');
        // }

        return view('teams.edit', ['team' => $team]);
    }

    public function update(Teams $team): RedirectResponse
    {
        // if (Auth::guest()) {
        //     return redirect('/login');
        // }

        request()->validate([
            'name' => ['required', 'min:3']
        ]);

        $team->update([
            'name' => request('name')
        ]);

        return redirect("/teams/{$team->id}");
    }

    public function destroy(Teams $team): RedirectResponse
    {
        // if (Auth::guest()) {
        //     return redirect('/login');
        // }

        $team->delete();

        return redirect("/teams");
    }
}

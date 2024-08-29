<?php

namespace App\Http\Controllers;

use App\Models\Rules;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    public function index()
    {
        $rules = Rules::all();

        return view(
            'rules.index',
            [
                'rules' => $rules
            ]
        );
    }

    public function create()
    {
        return view('rules.create');
    }

    public function show(Rules $rules)
    {
        return view('rules.show', ['rules' => $rules]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'point' => ['required']
        ]);
        Rules::create([
            'name' => request('name'),
            'point' => request('point')
        ]);

        return redirect('/rules');
    }

    public function edit(Rules $rules)
    {
        return view('rules.edit', ['rules' => $rules]);
    }

    public function update(Rules $rules)
    {
        // authorize (On hold ...)
        request()->validate([
            'name' => ['required', 'min:3'],
            'point' => ['required']
        ]);


        $rules->update([
            'name' => request('name'),
            'point' => request('point')
        ]);

        return redirect("/rules/{$rules->id}");
    }

    public function destroy(Rules $rules)
    {
        // authorize (On hold ...)

        $rules->delete();

        return redirect("/rules");
    }
}

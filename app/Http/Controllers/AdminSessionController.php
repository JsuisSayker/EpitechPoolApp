<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store() {
        $credentials = request()->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            return redirect('/teams');
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}

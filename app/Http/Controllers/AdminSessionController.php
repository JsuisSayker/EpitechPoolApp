<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(): RedirectResponse
    {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/teams');
    }

    public function destroy(): RedirectResponse
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        Auth::logout();
        return redirect('/');
    }
}

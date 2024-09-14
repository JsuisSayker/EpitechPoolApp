<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = Notifications::all();

        return view(
            'home',
            [
                'notifications' => $notifications
            ]
        );
    }

    // public function create()
    // {
    //     return view('notifications.create');
    // }

    // public function show(Notifications $notifications)
    // {
    //     return view('notifications.show', ['notifications' => $notifications]);
    // }

    public function store(Request $request)
    {
        $request->validate([
            'description' => ['required', 'min:1'],
        ]);
        Notifications::create([
            'description' => request('description')
        ]);

        return view('home', ['notifications' => Notifications::all()]);
    }

    // public function edit(Notifications $notifications)
    // {
    //     return view('notifications.edit', ['notifications' => $notifications]);
    // }

    public function update(Notifications $notifications)
    {
        // authorize (On hold ...)
        request()->validate([
            'description' => ['required', 'min:3']
        ]);

        $notifications->update([
            'description' => request('description')
        ]);
        return view('home', ['notifications' => Notifications::all()]);
    }

    // public function destroy(Notifications $notifications)
    // {
    //     $notifications->delete();

    //     return redirect('/notifications');
    // }
}

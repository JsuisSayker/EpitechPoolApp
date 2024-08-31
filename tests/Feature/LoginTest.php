<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// GET
it('can access the login page', function () {
    $this->get('/login')
        ->assertStatus(200);
});

// POST
it('can login', function () {
    // create a user
    User::factory()->create([
        'name' => 'Test User',
        'email' => env('ADMIN_EMAIL'),
    ]);

    // login
    $response = $this->post('/login', [
        'email' => env('ADMIN_EMAIL', 'test@example.com'),
        'password' => env('ADMIN_PASSWORD', 'password'),
    ]);

    $response->assertStatus(302); // Assuming it redirects on successful login
    $this->assertAuthenticated();
});

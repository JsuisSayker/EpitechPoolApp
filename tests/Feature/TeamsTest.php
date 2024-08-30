<?php

use App\Models\Teams;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// GET
it('can access the teams page', function () {
    $this->get('/teams')->assertStatus(200);
});

// POST
it('can create a team', function () {
    // not logged in
    $this->post('/teams', [
        'name' => 'Team Name'
    ])->assertStatus(302);

    $this->assertDatabaseMissing('teams', ['name' => 'Team Name']);

    // create a user
    User::factory()->create([
        'name' => 'Test User',
        'email' => env('ADMIN_EMAIL'),
    ]);

    $this->assertDatabaseHas('users', [
        'name' => 'Test User',
        'email' => env('ADMIN_EMAIL')
    ]);

    // login
    $response = $this->post('/login', [
        'email' => env('ADMIN_EMAIL', 'test@example.com'),
        'password' => env('ADMIN_PASSWORD', 'password'),
    ]);
    $response->assertStatus(302);
    $this->assertAuthenticated();

    // logged in
    $this->post('/teams', [
        'name' => 'Team Name'
    ])->assertStatus(302);

    $this->assertDatabaseHas('teams', ['name' => 'Team Name']);
});

// CREATE
it('can access creation page of a team', function () {
    // not logged in
    $this->get('/teams/create')->assertStatus(302);

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
    $response->assertStatus(302);
    $this->assertAuthenticated();

    // logged in
    $this->get('/teams/create')->assertStatus(200);
});

// // SHOW
// it('can access one team page', function () {
//     // create a user
//     User::factory()->create([
//         'name' => 'Test User',
//         'email' => env('ADMIN_EMAIL'),
//     ]);

//     // login
//     $response = $this->post('/login', [
//         'email' => env('ADMIN_EMAIL', 'test@example.com'),
//         'password' => env('ADMIN_PASSWORD', 'password'),
//     ]);
//     $response->assertStatus(302);
//     $this->assertAuthenticated();

//     // logged in
//     $team =  Teams::factory()->create();

//     $this->get('/teams/' . $team->id)
//         ->assertStatus(200);
// });

// DELETE
it('can delete a team', function () {
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
    $response->assertStatus(302);
    $this->assertAuthenticated();

    $team = Teams::factory()->create();

    $this->delete('/teams/' . $team->id)->assertStatus(302);

    $this->assertDatabaseMissing('teams', ['id' => $team->id]);
});

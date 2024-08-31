<?php

use App\Models\Teams;
use App\Models\Points;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// GET
it('can access the points page', function () {
    $this->get('/points')->assertStatus(200);
});

// POST
it('can create a team', function () {
    // not logged in
    $this->post('/points', [
        'teams_id' => 1,
        'point' => '400',
        'description' => 'example description'
    ])->assertStatus(302);

    $this->assertDatabaseMissing('points', [
        'teams_id' => '1',
        'point' => '400',
        'description' => 'example description'
    ]);

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

    $team = Teams::factory()->create();

    // logged in
    $this->post('/points', [
        'teams_id' => $team->id,
        'point' => '400',
        'description' => 'example description'
    ])->assertStatus(302);

    $this->assertDatabaseHas('points', [
        'teams_id' => '1',
        'point' => '400',
        'description' => 'example description'
    ]);
});

// CREATE
it('can access creation page of a team', function () {
    // not logged in
    $this->get('/points/create?teams_id=1')->assertStatus(302);

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

    $team = Teams::factory()->create();

    // logged in
    $this->get('/points/create?teams_id=' . $team->id)->assertStatus(200);
});

// DELETE
it('can delete a team', function () {
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
    $team = Teams::factory()->create();
    $this->assertDatabaseHas('teams', [
        'id' => $team->id,
        'name' => $team->name,
    ]);

    $point = Points::factory()->create();
    $this->assertDatabaseHas('points', [
        'id' => $point->id,
        'teams_id' => $team->id
    ]);

    $this->delete('/points/' . $point->id)->assertStatus(302);

    $this->assertDatabaseMissing('points', ['id' => $point->id]);
});

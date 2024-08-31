<?php

use App\Models\Rules;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// GET
it('can access the rules page', function () {
    $this->get('/rules')->assertStatus(200);
});

// POST
it('can create a rule', function () {
    // not logged in
    $this->post('/rules', [
        'description' => 'rule description',
    ])->assertStatus(302);

    $this->assertDatabaseMissing('rules', ['description' => 'rule description']);

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
    $this->post('/rules', [
        'description' => 'rule description',
    ])->assertStatus(302);

    $this->assertDatabaseHas('rules', ['description' => 'rule description']);
});

// CREATE
it('can access creation page of a rule', function () {
    // not logged in
    $this->get('/rules/create')->assertStatus(302);

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
    $this->get('/rules/create')->assertStatus(200);
});

// DELETE
it('can delete a rule', function () {
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

    $rule = Rules::factory()->create();

    $this->delete('/rules/' . $rule->id)->assertStatus(302);

    $this->assertDatabaseMissing('rules', ['id' => $rule->id]);
});

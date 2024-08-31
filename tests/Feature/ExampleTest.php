<?php

it('can access the home page', function () {
    $this->get('/')
        ->assertStatus(200);
});

it('can access the collection page', function () {
    $this->get('/collection')
        ->assertStatus(200);
});

it('can access the login page', function () {
    $this->get('/login')
        ->assertStatus(200);
});

// Repeat for other GET routes...

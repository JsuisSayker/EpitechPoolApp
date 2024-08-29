<?php

use App\Http\Controllers\GraphicController;
use App\Http\Controllers\TeamsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSessionController;

Route::view('/', 'home');
Route::resource('teams', TeamsController::class);
Route::get('/graphic', [GraphicController::class, 'index'])->name('graphic.index');
Route::view('/rules', 'rules');
Route::view('/collection', 'collection');

Route::get("/login", [AdminSessionController::class, 'create']);
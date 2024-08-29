<?php

use App\Http\Controllers\GraphicController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\RulesController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::resource('teams', TeamsController::class);
Route::get('/graphic', [GraphicController::class, 'index'])->name('graphic.index');
Route::resource('rules', RulesController::class);
Route::view('/collection', 'collection');

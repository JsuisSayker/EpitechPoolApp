<?php

use App\Http\Controllers\PointsController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\RulesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSessionController;
use App\Http\Controllers\FileUploadController;

Route::get('/', function () {
    return redirect('/teams');
});
// Route::resource('teams', TeamsController::class);
Route::get('/teams', [TeamsController::class, 'index']);
Route::get('/teams/create', [TeamsController::class, 'create'])->middleware('auth');
Route::get('/teams/{team}', [TeamsController::class, 'show']);
Route::post('/teams', [TeamsController::class, 'store'])->middleware('auth');
Route::get('/teams/{team}/edit', [TeamsController::class, 'edit'])->middleware('auth');
Route::patch('/teams/{team}', [TeamsController::class, 'update'])->middleware('auth');
Route::delete('/teams/{team}', [TeamsController::class, 'destroy'])->middleware('auth');

Route::get('/points', [PointsController::class, 'index']);
Route::get('/points/create', [PointsController::class, 'create'])->middleware('auth');
Route::post('/points', [PointsController::class, 'store'])->middleware('auth');
Route::get('/points/{point}/edit', [PointsController::class, 'edit'])->middleware('auth');
Route::post('/points/{point}', [PointsController::class, 'update'])->middleware('auth');
Route::delete('/points/{point}', [PointsController::class, 'destroy'])->middleware('auth');

// Route::resource('points', PointsController::class);
// Route::resource('rules', RulesController::class);
Route::get('/rules', [RulesController::class, 'index']);
Route::get('/rules/create', [RulesController::class, 'create'])->middleware('auth');
Route::get('/rules/{rules}', [RulesController::class, 'show']);
Route::post('/rules', [RulesController::class, 'store'])->middleware('auth');
Route::get('/rules/{rules}/edit', [RulesController::class, 'edit'])->middleware('auth');
Route::post('/rules/{rules}', [RulesController::class, 'update'])->middleware('auth');
Route::delete('/rules/{rules}', [RulesController::class, 'destroy'])->middleware('auth');


Route::view('/collection', 'collection');

Route::get("/login", [AdminSessionController::class, 'create'])->name('login');
Route::post("/login", [AdminSessionController::class, 'store']);
Route::post("/logout", [AdminSessionController::class, 'destroy']);

Route::get('upload-ui', [FileUploadController::class, 'uploadUi' ]);
Route::post('file-upload', [FileUploadController::class, 'FileUpload' ])->name('FileUpload');

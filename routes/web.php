<?php

use App\Http\Controllers\GraphicController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\RulesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSessionController;
use App\Http\Controllers\FileUploadController;

Route::view('/', 'home');
Route::resource('teams', TeamsController::class);
Route::resource('points', PointsController::class);
Route::resource('rules', RulesController::class);
Route::view('/collection', 'collection');

Route::get("/login", [AdminSessionController::class, 'create']);
Route::post("/login", [AdminSessionController::class, 'store']);
Route::post("/logout", [AdminSessionController::class, 'destroy']);

Route::get('upload-ui', [FileUploadController::class, 'dropzoneUi' ]);
Route::post('file-upload', [FileUploadController::class, 'dropzoneFileUpload' ])->name('dropzoneFileUpload');

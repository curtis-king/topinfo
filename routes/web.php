<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\projectController;
use App\Http\Controllers\partenaireController;
use App\Http\Controllers\services;
use App\Http\Controllers\actuality;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('projects', projectController::class);
Route::resource('partenaires', partenaireController::class);
Route::resource('services', services::class);

Route::resource('actuality', actuality::class);
Route::get('actuality/{id}/images', [actuality::class, 'images_actuality'])->name('actuality.images');

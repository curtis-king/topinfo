<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\partenaireController;
use App\Http\Controllers\services;
use App\Http\Controllers\actuality;
use App\Http\Controllers\GalerieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('projects', projectController::class);
    Route::resource('partenaires', partenaireController::class);
    Route::resource('services', services::class);
    Route::resource('actuality', actuality::class);
    Route::get('actuality/{id}/images', [actuality::class, 'images_actuality'])->name('actuality.images');
    Route::resource('galerie', GalerieController::class)->except(['show']);
});

require __DIR__.'/auth.php';

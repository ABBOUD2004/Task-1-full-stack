<?php
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordResetLinkController;
// Homepage
Route::get('/', fn () => view('welcome'))->name('home');

// Dashboard (authenticated + verified only)
Route::get('/dashboard', [ArticleController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// Public: Anyone can view list of articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Authenticated routes
Route::middleware(['auth'])->group(function () {

    // Article resource routes (except index which is public)
    Route::resource('articles', ArticleController::class)->except(['index']);

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
});

require __DIR__.'/auth.php';

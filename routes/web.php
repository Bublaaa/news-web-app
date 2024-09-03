<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('./layouts/public-news-page');
});

Auth::routes();

// Admin Routes
Route::middleware(['auth', 'role.redirect:admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Author Routes
Route::middleware(['auth', 'role.redirect:author'])->group(function () {
    Route::get('/author-dashboard', [AuthorController::class, 'index'])->name('author.dashboard');
});
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LandingController;


Route::get('/', function () {
    return view('./news');
});

Auth::routes();

// Admin Routes
Route::middleware(['auth', 'role.redirect:admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/publish-request', [AdminController::class, 'showPublishRequests'])->name('admin.publish-request');
    Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.users');
    Route::get('/articles', [AdminController::class, 'showArticles'])->name('admin.articles');
    Route::resource('categories', CategoryController::class);
});

// Author Routes
Route::middleware(['auth', 'role.redirect:author'])->group(function () {
    Route::get('/author-dashboard', [AuthorController::class, 'index'])->name('author.dashboard');
    Route::get('/author-articles', [AuthorController::class, 'articlesIndex'])->name('author.articles');
    Route::get('/author-new-articles', [AuthorController::class, 'createNewArticles'])->name('author.new.articles');
    Route::resource('articles', ArticleController::class);
});
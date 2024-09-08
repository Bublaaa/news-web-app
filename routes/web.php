<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LandingPageController;


Route::get('/', [LandingPageController::class, 'showNews']);

Auth::routes();

// Admin Routes
Route::middleware(['auth', 'role.redirect:admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');  // Route for admin dashboard
    Route::get('/publish-request', [AdminController::class, 'showPublishRequests'])->name('admin.publish-request');
    Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.users');
    Route::get('/articles', [AdminController::class, 'showArticles'])->name('admin.articles');
    Route::resource('categories', CategoryController::class);
});

// Author Routes
Route::middleware(['auth', 'role.redirect:author'])->prefix('author')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('author.dashboard'); 
    Route::get('/author-articles', [AuthorController::class, 'articlesIndex'])->name('author.articles');
    Route::get('/author-new-articles', [AuthorController::class, 'createNewArticles'])->name('author.new.articles');
    Route::get('/publish-request', [AuthorController::class, 'showPublishRequest'])->name('author.publish.request');
    Route::get('/account', [AuthorController::class, 'showAccountDetails'])->name('author.account.setting');
    Route::resource('articles', ArticleController::class);
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuickGigsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GigController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// homepage
Route::get('/', [QuickGigsController::class, 'index'])->name('quickgigs.index');

// browse gigs
Route::get('/search', [QuickGigsController::class, 'search'])->name('quickgigs.search');
Route::get('/category/{category}', [QuickGigsController::class, 'category'])->name('quickgigs.category');
Route::get('/gig/{gig:slug}', [QuickGigsController::class, 'show'])->name('quickgigs.show');

// profile
Route::get('/profile/{user:username}', [ProfileController::class, 'show'])->name('profile.show');

/*
|--------------------------------------------------------------------------
| Guest Routes (Authentication)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

/*
|--------------------------------------------------------------------------
| Protected Routes (Authenticated Users)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // auth
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    
    // gig management
    Route::get('/my-gigs', [GigController::class, 'myGigs'])->name('gigs.my-gigs');
    Route::get('/gigs/create', [GigController::class, 'create'])->name('gigs.create');
    Route::post('/gigs', [GigController::class, 'store'])->name('gigs.store');
    Route::get('/gigs/{gig:slug}/edit', [GigController::class, 'edit'])->name('gigs.edit');
    Route::put('/gigs/{gig:slug}', [GigController::class, 'update'])->name('gigs.update');
    Route::delete('/gigs/{gig:slug}', [GigController::class, 'destroy'])->name('gigs.destroy');
});

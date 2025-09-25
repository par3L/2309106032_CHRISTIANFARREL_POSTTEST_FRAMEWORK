<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuickGigsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [QuickGigsController::class, 'index'])->name('quickgigs.index');
Route::get('/search', [QuickGigsController::class, 'search'])->name('quickgigs.search');
Route::get('/category/{category}', [QuickGigsController::class, 'category'])->name('quickgigs.category');
Route::get('/gig/{gig}', [QuickGigsController::class, 'show'])->name('quickgigs.show');

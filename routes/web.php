<?php

use App\Http\Middleware\CheckAdmin;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeeklyPickController;
use App\Http\Controllers\WeeklyPickPanelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/ranking', function () {
    return view('ranking');
})->middleware(['auth', 'verified'])->name('dashboard');


// admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource("weekly-pick-panel", WeeklyPickPanelController::class);
});


// kazdy user
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/weekly-pick', [WeeklyPickController::class, 'show'])->name('weekly-pick.show');
    Route::post('/weekly-pick', [WeeklyPickController::class, 'store'])->name('weekly-pick.store');
});

require __DIR__.'/auth.php';

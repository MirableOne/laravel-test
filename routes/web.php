<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::delete('/task', [TaskController::class, 'destroy'])->name('task.destroy');
    Route::get('/task', [TaskController::class, 'create'])->name('task.create');
    Route::post('/task', [TaskController::class, 'store'])->name('task.store');
    Route::post('/task-done', [TaskController::class, 'markAsDone'])->name('task.mark-as-done');
});

require __DIR__ . '/auth.php';

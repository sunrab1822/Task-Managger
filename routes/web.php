<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [TaskController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/group', [GroupController::class, 'show'])->middleware(['auth', 'verified'])->name('group');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/task', [TaskController::class, 'edit'])->name('task');
    Route::post('/task', [TaskController::class, 'save'])->name('task.add');
    Route::get('/group', [GroupController::class, 'show'])->name('group');
    Route::get('/mygroup', [GroupController::class, 'showGroup'])->name('group.show');
    Route::post('/group', [GroupController::class, 'save'])->name('group.add');
    Route::get('/taskDetails', [TaskController::class, 'showDetail'])->name('task.details');

});




require __DIR__.'/auth.php';

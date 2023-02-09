<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController :: class, 'home']);

Route::get('/admin', [MainController :: class, 'loggedAdmin']) -> middleware(['auth', 'verified']) -> name('admin');

Route::get('/projects', [MainController :: class, 'projects']);

Route :: get('/project/show/{project}', [MainController :: class, 'projectShow'])
    -> name('project.show');



Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
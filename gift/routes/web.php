<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'home']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('view_category', [AdminController::class, 'view_category']);
Route::post('add_category', [AdminController::class, 'add_category']);
Route::get('delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('edit_category/{id}', [AdminController::class, 'edit_category']);
Route::post('update_category/{id}', [AdminController::class, 'update_category']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

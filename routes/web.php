<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'index'])->name('home');

Route::get('/sign-in', [UserController::class, 'login'])->name('sign-in');
Route::post('/sign-in', [UserController::class, 'loginPost'])->name('sign-in.post');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerPost'])->name('register.post');
Route::get('/sign-out', [UserController::class, 'logout'])->name('sign-out');

Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});

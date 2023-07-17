<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::get('/profile', [UserController::class, 'profile'])->name('profile.show');
Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
Route::post('/change-password', [UserController::class, 'changePassword'])->name('password.change');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('admin/users', DashboardController::class);
    Route::resource('users', UserController::class);
});

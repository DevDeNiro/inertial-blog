<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login');

Route::middleware(['auth', 'can:accessAdminPanel'])->group(function () {

    Route::get('/', function () {
        return Inertia::render('index', [
            'name' => 'Laravel',
        ]);
    });
    // Route::resource('users', UserController::class);
});

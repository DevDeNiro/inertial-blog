<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login');

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return Inertia::render('index', [
            'name' => 'Laravel',
        ]);
    });


    Route::get('/dashboard', function () {
        return Inertia::render('Pages/Dashboard', [
            'name' => 'Laravel',
        ]);
    });
});

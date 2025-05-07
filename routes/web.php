<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; // tambahkan ini di bagian atas
Route::get('/', function () {
    return view('awalan');
})->name('awalan');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login-submit', [PageController::class, 'loginSubmit'])->name('login.submit');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');


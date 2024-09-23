<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::get('/login', [UserController::class, 'login_view']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register_view']);
Route::post('/register', [UserController::class, 'register']);
route::get('/logout', [UserController::class, 'logout']);
Route::get('/forbidden', fn() => view('auth.forbidden'));

Route::prefix('dashboard')->middleware(IsAdmin::class)->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class);

    Route::resource('transactions', TransactionController::class);

    Route::get('/users/profile', fn() => view('users.profile'))->name('users.profile');
    Route::resource('users', UserController::class);
});

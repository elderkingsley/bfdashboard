<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductionController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => true
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('customer', CustomerController::class);

Route::resource('production', ProductionController::class);

Route::resource('expense', ExpenseController::class);

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BancoBdvController;
use App\Http\Controllers\BancoBtController;
use App\Http\Controllers\BancoTdcController;
use App\Http\Controllers\UserController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/banco-bdv', [BancoBdvController::class, 'index'])->name('banco_bdv.index');
Route::get('/banco-bt', [BancoBtController::class, 'index'])->name('banco_bt.index');
Route::get('/banco-tdc', [BancoTdcController::class, 'index'])->name('banco_tdc.index');

Route::resource('users', UserController::class);

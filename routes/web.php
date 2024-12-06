<?php

use App\Http\Controllers\AppDeviceController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layout');
// });


Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/add-device', [AppDeviceController::class, 'index'])->name('add-device');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/login', [LoginController::class, 'index'])->name('login');


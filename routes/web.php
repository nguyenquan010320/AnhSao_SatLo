<?php

use App\Http\Controllers\AppDeviceController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticalController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layout');
// });


Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/add-device', [AppDeviceController::class, 'index'])->name('add-device');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/update-info', [LoginController::class, 'updateInfo'])->name('update-info');
Route::post('/store-statisticals', [StatisticalController::class, 'store'])->name('store-statisticals');
Route::get('/get-statisticals', [StatisticalController::class, 'list'])->name('get-statisticals');


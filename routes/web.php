<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', [LoginController::class, 'index']);
Route::get('register', [LoginController::class, 'register']);



Route::post('actionRegister', [LoginController::class, 'actionRegister'])->name('actionRegister');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

Route::resource('home', HomeController::class);
Route::resource('category', CategoryController::class);
Route::resource('barang', BarangController::class);

<?php

use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\registerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\tupoksiController;
use App\Http\Controllers\visimisiController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/beranda', [berandaController::class, 'index']);
Route::resource(name: '/visimisi',  controller: visimisiController::class);
Route::resource(name: '/tupoksi',  controller: tupoksiController::class);

// login
Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::post('/logout', [loginController::class, 'logout'])->name('logout');
//register
Route::get('/register', [registerController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [registerController::class, 'register']);
Route::post('/register', [registerController::class, 'store'])->name('register.store');



<?php

use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\registerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\tupoksiController;
use App\Http\Controllers\visimisiController;
use App\Http\Controllers\beritaController;
use App\Http\Controllers\maklumatController;
use App\Http\Controllers\strukturController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/beranda', [berandaController::class, 'index']);
Route::resource( '/visimisi',   visimisiController::class);
Route::resource( '/tupoksi',  tupoksiController::class);
Route::resource( '/struktur',  strukturController::class);
Route::resource( '/maklumat',  maklumatController::class);


// login
Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::post('/logout', [loginController::class, 'logout'])->name('logout');
//register
Route::get('/register', [registerController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [registerController::class, 'register']);
Route::post('/register', [registerController::class, 'store'])->name('register.store');
Route::middleware(['auth'])->group(function () {
Route::resource('berita', BeritaController::class);
});

//berita
Route::resource('/berita', beritaController::class);
Route::get('/', [beritaController::class, 'index'])->name('beranda');

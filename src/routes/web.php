<?php

use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\registerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\tupoksiController;
use App\Http\Controllers\visimisiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\maklumatController;
use App\Http\Controllers\strukturController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProdukhukumController;
use App\Http\Controllers\TentangController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/beranda', [berandaController::class, 'index']);
Route::resource( '/visimisi',   visimisiController::class);
Route::resource( '/tupoksi',  tupoksiController::class);
Route::resource( '/struktur',  strukturController::class);
Route::resource( '/maklumat',  maklumatController::class);
Route::resource( '/tentang',  TentangController::class);
Route::resource( '/profil',  ProfilController::class);
Route::resource( '/produkhukum',  ProdukhukumController::class);


// login
Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::post('/logout', [loginController::class, 'logout'])->name('logout');
//register
Route::get('/register', [registerController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [registerController::class, 'register']);
Route::post('/register', [registerController::class, 'store'])->name('register.store');
Route::middleware(['auth'])->group(function () {
});

//berita
Route::get('/beritakita', [BeritaController::class, 'index'])->name('beritakita.index');
Route::post('/beritakita', [BeritaController::class, 'store'])->name('beritakita.store');
Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

//artikel

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');


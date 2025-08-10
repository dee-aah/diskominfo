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
//Route::resource( '/artikel.edit',  ArtikelController::class);


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
Route::get('/beritakita/dashboard', [BeritaController::class, 'dashboard'])->name('beritakita.dashboard');
Route::get('/beritakita', [BeritaController::class, 'index'])->name('beritakita.index');
Route::post('/beritakita', [BeritaController::class, 'store'])->name('beritakita.store');
Route::get('/beritakita/{id}/edit', [BeritaController::class, 'edit'])->name('beritakita.edit');
Route::put('/beritakita/{id}', [BeritaController::class, 'update'])->name('beritakita.update');
Route::delete('/beritakita/{id}', [BeritaController::class, 'destroy'])->name('beritakita.destroy');
Route::get('/beritakita/create', [BeritaController::class, 'create'])->name('beritakita.create');
Route::get('/beritakita/{id}', [BeritaController::class, 'show'])->name('beritakita.show');
Route::get('/beritakita/kategori/{type}', [BeritaController::class, 'kategori'])->name('beritakita.kategori');


//artikel
Route::get('/artikel/dashboard', [ArtikelController::class, 'dashboard'])->name('artikel.dashboard');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/artikel/search', [ArtikelController::class, 'searching'])->name('artikel.search');
Route::get('/artikel-terbaru', [ArtikelController::class, 'showLatest'])->name('artikel.terbaru');
Route::get('/artikel/search', [ArtikelController::class, 'search'])->name('artikel.search');








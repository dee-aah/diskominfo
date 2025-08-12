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
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LayananDetailController;

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

//layanan
Route::get('/layanan/dashboard', [LayananController::class, 'dashboard'])->name('layanan.dashboard');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
Route::get('/layanan', [LayananController::class, 'create'])->name('layanan.create');
Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');
Route::get('/layanan/{id}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
Route::put('/layanan/{id}', [LayananController::class, 'update'])->name('layanan.update');
//program
Route::get('/program/dashboard', [ProgramController::class, 'dashboard'])->name('program.dashboard');
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::post('/program', [ProgramController::class, 'store'])->name('program.store');
Route::get('/program', [ProgramController::class, 'create'])->name('program.create');
Route::delete('/program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');
Route::get('/program/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
Route::put('/program/{id}', [ProgramController::class, 'update'])->name('program.update');
//Detail layanan
Route::get('/layanan_detail/dashboard', [LayananDetailController::class, 'dashboard'])->name('layanan_detail.dashboard');
Route::get('/layanan_detail', [LayananDetailController::class, 'index'])->name('layanan_detail.index');
Route::post('/layanan_detail', [LayananDetailController::class, 'store'])->name('layanan_detail.store');
Route::get('/layanan_detail', [LayananDetailController::class, 'create'])->name('layanan_detail.create');
Route::delete('/layanan_detail/{id}', [LayananDetailController::class, 'destroy'])->name('layanan_detail.destroy');
Route::get('/layanan_detail/{id}/edit', [LayananDetailController::class, 'edit'])->name('layanan_detail.edit');
Route::put('/layanan_detail/{id}', [LayananDetailController::class, 'update'])->name('layanan_detail.update');
//berita
Route::get('/beritakita/dashboard', [BeritaController::class, 'dashboard'])->name('beritakita.dashboard');
Route::get('/beritakita', [BeritaController::class, 'index'])->name('beritakita.index');
Route::post('/beritakita', [BeritaController::class, 'store'])->name('beritakita.store');
Route::get('/beritakita/{id}/edit', [BeritaController::class, 'edit'])->name('beritakita.edit');
Route::put('/beritakita/{id}', [BeritaController::class, 'update'])->name('beritakita.update');
Route::delete('/beritakita/{id}', [BeritaController::class, 'destroy'])->name('beritakita.destroy');
Route::get('/beritakita/create', [BeritaController::class, 'create'])->name('beritakita.create');
Route::get('/beritakita/{slug}', [BeritaController::class, 'show'])->name('beritakita.show');

Route::get('/kategori/{slug}', [BeritaController::class, 'kategori_brt'])->name('kategori.berita');



//artikel
Route::get('/artikel/dashboard', [ArtikelController::class, 'dashboard'])->name('artikel.dashboard');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/artikel/search', [ArtikelController::class, 'searching'])->name('artikel.search');
Route::get('/artikel-terbaru', [ArtikelController::class, 'showLatest'])->name('artikel.terbaru');
Route::get('/artikel/search', [ArtikelController::class, 'search'])->name('artikel.search');








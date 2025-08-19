<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes User
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\User\UserArtikelController;
use App\Http\Controllers\User\UserBeritaController;
/*
|--------------------------------------------------------------------------
| Web Routes Admin
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\AdminLayananController;
use App\Http\Controllers\Admin\AdminVisiController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\LayananDetailController;
/*
|--------------------------------------------------------------------------
| Web Routes Publik
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\berandaController;
use App\Http\Controllers\tupoksiController;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\maklumatController;
use App\Http\Controllers\strukturController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProdukhukumController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;


//======================================================================
// 1. RUTE PUBLIK (Dapat diakses oleh semua pengunjung)
//======================================================================

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', [berandaController::class, 'index'])->name('beranda');

// Rute untuk halaman-halaman statis atau semi-statis
Route::resource('/visimisi', VisiController::class)->only(['index', 'show']);
Route::resource('/tupoksi', tupoksiController::class)->only(['index', 'show']);
Route::resource('/struktur', strukturController::class)->only(['index', 'show']);
Route::resource('/maklumat', maklumatController::class)->only(['index', 'show']);
Route::resource('/tentang', TentangController::class)->only(['index', 'show']);
Route::resource('/profil', ProfilController::class)->only(['index', 'show']);
Route::resource('/produkhukum', ProdukhukumController::class)->only(['index', 'show']);

// Rute untuk Berita (Publik)
Route::get('/beritakita', [BeritaController::class, 'index'])->name('beritakita.index');
Route::get('/beritakita/{slug}', [BeritaController::class, 'show'])->name('beritakita.show');
Route::get('/kategori/{slug}', [BeritaController::class, 'kategori_brt'])->name('kategori.berita');

// Rute untuk artikel (Publik)
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/artikel/search', [ArtikelController::class, 'search'])->name('artikel.search');

//======================================================================
// 2. RUTE AUTENTIKASI (Login, Register)
//======================================================================

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


//======================================================================
// 3. RUTE TERPROTEKSI (Membutuhkan Login)
//======================================================================

Route::middleware(['auth'])->group(function () {

    // Rute Logout (hanya bisa diakses setelah login)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //------------------------------------------------------------------
    // A. RUTE UNTUK ROLE 'ADMIN' & 'USER'
    //------------------------------------------------------------------

    Route::middleware(['role:admin,user'])->group(function () {
        // --- Manajemen Berita ---
        Route::get('/berita/dashboard', [UserBeritaController::class, 'dashboard'])->name('berita.dashboard');
        Route::get('/berita/create', [UserBeritaController::class, 'create'])->name('berita.create');
        Route::post('/berita', [UserBeritaController::class, 'store'])->name('berita.store');
        Route::get('/berita/{id}/edit', [UserBeritaController::class, 'edit'])->name('berita.edit');
        Route::put('/berita/{id}', [UserBeritaController::class, 'update'])->name('berita.update');
        Route::delete('/berita/{id}', [UserBeritaController::class, 'destroy'])->name('berita.destroy');

        // --- Manajemen artikel ---
        Route::get('/artikel/dashboard', [UserArtikelController::class, 'dashboard'])->name('artikel.dashboard');
        Route::get('/artikel/create', [UserArtikelController::class, 'create'])->name('artikel.create');
        Route::post('/artikel', [UserArtikelController::class, 'store'])->name('artikel.store');
        Route::get('/artikel/{id}/edit', [UserArtikelController::class, 'edit'])->name('artikel.edit');
        Route::put('/artikel/{id}', [UserArtikelController::class, 'update'])->name('artikel.update');
        Route::delete('/artikel/{id}', [UserArtikelController::class, 'destroy'])->name('artikel.destroy');
    });

    //------------------------------------------------------------------
    // B. RUTE KHUSUS UNTUK ROLE 'ADMIN'
    //------------------------------------------------------------------
    Route::middleware(['role:admin'])->group(function () {
        // --- Manajemen Layanan ---
        Route::get('/layanan/dashboard', [AdminLayananController::class, 'dashboard'])->name('layanan.dashboard');
        Route::get('/layanan/create', [AdminLayananController::class, 'create'])->name('layanan.create');
        Route::post('/layanan', [AdminLayananController::class, 'store'])->name('layanan.store');
        Route::get('/layanan/{id}/edit', [AdminLayananController::class, 'edit'])->name('layanan.edit');
        Route::put('/layanan/{id}', [AdminLayananController::class, 'update'])->name('layanan.update');
        Route::delete('/layanan/{id}', [AdminLayananController::class, 'destroy'])->name('layanan.destroy');

        // --- Manajemen Detail Layanan ---
        Route::get('/layanan_detail/dashboard', [LayananDetailController::class, 'dashboard'])->name('layanan_detail.dashboard');
        Route::get('/layanan_detail/create', [LayananDetailController::class, 'create'])->name('layanan_detail.create');
        Route::post('/layanan_detail', [LayananDetailController::class, 'store'])->name('layanan_detail.store');
        Route::get('/layanan_detail/{id}/edit', [LayananDetailController::class, 'edit'])->name('layanan_detail.edit');
        Route::put('/layanan_detail/{id}', [LayananDetailController::class, 'update'])->name('layanan_detail.update');
        Route::delete('/layanan_detail/{id}', [LayananDetailController::class, 'destroy'])->name('layanan_detail.destroy');

        // --- Manajemen Program ---
        Route::get('/program/dashboard', [ProgramController::class, 'dashboard'])->name('program.dashboard');
        Route::get('/program/create', [ProgramController::class, 'create'])->name('program.create');
        Route::post('/program', [ProgramController::class, 'store'])->name('program.store');
        Route::get('/program/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
        Route::put('/program/{id}', [ProgramController::class, 'update'])->name('program.update');
        Route::delete('/program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');

        // --- Manajemen Visi Misi ---
        Route::get('/visi/dashboard', [AdminVisiController::class, 'dashboard'])->name('visi.dashboard');
        Route::get('/visi/create', [AdminVisiController::class, 'create'])->name('visi.create');
        Route::post('/visi', [AdminVisiController::class, 'store'])->name('visi.store');
        Route::get('/visi/{id}/edit', [AdminVisiController::class, 'edit'])->name('visi.edit');
        Route::put('/visi/{id}', [AdminVisiController::class, 'update'])->name('visi.update');
        Route::delete('/visi/{id}', [AdminVisiController::class, 'destroy'])->name('visi.destroy');

        // ... Tambahkan rute khusus admin lainnya di sini
    });
});


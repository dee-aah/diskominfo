<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
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
use App\Http\Controllers\Admin\LayananDetailController;
use App\Http\Controllers\Admin\AdminTupoksiController;
use App\Http\Controllers\Admin\UraianController;
use App\Http\Controllers\Admin\AdminTentangController;
use App\Http\Controllers\Admin\AdminStrukturController;
use App\Http\Controllers\Admin\AdminMaklumatController;
use App\Http\Controllers\Admin\AdminProfilController;
use App\Http\Controllers\Admin\AdminProfilContController;
use App\Http\Controllers\Admin\AdminProdukHukumController;
use App\Http\Controllers\Admin\AdminPHContController;
use App\Http\Controllers\Admin\AdminPimpinanController;
use App\Http\Controllers\Admin\AdminSektoralController;
use App\Http\Controllers\Admin\AdminSektoralContController;
use App\Http\Controllers\Admin\AdminPerencanaanController;
use App\Http\Controllers\Admin\AdminPerencanaanContController;
use App\Http\Controllers\Admin\AdminEvaluasiController;
use App\Http\Controllers\Admin\AdminEvaluasiContController;
use App\Http\Controllers\Admin\AdminLayananBerandaController;

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
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PerencanaanController;
use App\Http\Controllers\SektoralController;
use App\Http\Controllers\EvaluasiController;

//======================================================================
// 1. RUTE PUBLIK (Dapat diakses oleh semua pengunjung)
//======================================================================


// ... route Anda yang lain

//Route::get('/sektoral', [KasusController::class, 'index']);
Route::resource('/sektoral', SektoralController::class)->only(['index']);
// Route::get('/sektoral/kasus', [SektoralController::class, 'kasus'])->name('sektoral.kasus');
// Route::get('/sektoral/jenisKekerasan', [SektoralController::class, 'jenisKekerasan'])->name('sektoral.jenisKekerasan');
// Route::get('/sektoral/PasanganSubur', [SektoralController::class, 'PasanganSubur'])->name('sektoral.PasanganSubur');
// Route::get('/sektoral/PasanganSuburKecamatan', [SektoralController::class, 'PasanganSuburKecamatan'])->name('sektoral.PasanganSuburKecamatan');
// Route::get('/sektoral/KeluargaBerencana', [SektoralController::class, 'KeluargaBerencana'])->name('sektoral.KeluargaBerencana');
// Route::get('/sektoral/KbKontrasepsi', [SektoralController::class, 'KbKontrasepsi'])->name('sektoral.KbKontrasepsi');
// Route::get('/sektoral/KbKontrasepsiKecamatan', [SektoralController::class, 'KbKontrasepsiKecamatan'])->name('sektoral.KbKontrasepsiKecamatan');
// Route::get('/sektoral/KbKecamatan', [SektoralController::class, 'KbKecamatan'])->name('sektoral.KbKecamatan');
// Route::get('/sektoral/PemberdayaanGender', [SektoralController::class, 'PemberdayaanGender'])->name('sektoral.PemberdayaanGender');
// Route::get('/sektoral/PembangunanGender', [SektoralController::class, 'PembangunanGender'])->name('sektoral.PembangunanGender');
// Contoh grup middleware auth, JANGAN letakkan route 'pdf.stream' di sini
Route::get('/', function () {
    return view('welcome');
});
Route::prefix('pdf')->name('pdf.')->group(function () {
    Route::get('/', [PdfController::class, 'index'])->name('index');
    Route::post('/', [PdfController::class, 'store'])->name('store');
    Route::get('/{id}', [PdfController::class, 'show'])->name('show');
    Route::get('/{id}/download', [PdfController::class, 'download'])->name('download');
    Route::delete('/{id}', [PdfController::class, 'destroy'])->name('destroy');
});
// Rute untuk halaman-halaman statis atau semi-statis
Route::resource('/visimisi', VisiController::class)->only(['index', 'show']);
Route::resource('/beranda', berandaController::class)->only(['index']);
Route::get('/layanans', [LayananController::class, 'index'])->name('layanans.index');
Route::get('/layanans/{layanan:slug}', [LayananController::class, 'show'])->name('layanans.show');

Route::resource('/tupoksi', tupoksiController::class)->only(['index', 'show']);
Route::resource('/layanan_details', LayananDetailController::class)->only(['index', 'show']);
Route::resource('/struktur', strukturController::class)->only(['index', 'show']);
Route::resource('/maklumatt', maklumatController::class)->only(['index']);
Route::resource('/tentang', TentangController::class)->only(['index', 'show']);
Route::resource('/profil', ProfilController::class)->only(['index', 'show']);
Route::resource('/produkhukum', ProdukhukumController::class)->only(['index', 'show']);
Route::get('/produkhukum/{id}/download', [App\Http\Controllers\ProdukhukumController::class, 'download'])
        ->name('produkhukum.download');
Route::get('/produkhukum/{id}', [ProdukHukumController::class, 'show'])->name('produkhukum.show');
Route::get('/produkhukum/{id}', [App\Http\Controllers\ProdukhukumController::class, 'preview'])->name('produkhukum.preview');
Route::resource('/dokumenperencanaan', PerencanaanController::class)->only(['index', 'show']);
Route::resource('/dokumenevaluasi', EvaluasiController::class)->only(['index', 'show']);
// Rute untuk Berita (Publik)
Route::get('/beritakita', [BeritaController::class, 'index'])->name('beritakita.index');
Route::get('/beritakita/{slug}', [BeritaController::class, 'show'])->name('beritakita.show');
Route::get('/kategori/{slug}', [BeritaController::class, 'kategori_brt'])->name('kategori.berita');
Route::get('/beritakita/{id}', [BeritaController::class, 'show'])->name('beritakita.show');


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

    Route::middleware(['role:user'])->group(function () {
        // --- Manajemen Berita ---
        Route::get('/beritaa/dashboard', [UserBeritaController::class, 'dashboard'])->name('beritaa.dashboard');
        Route::get('/beritaa/create', [UserBeritaController::class, 'create'])->name('beritaa.create');
        Route::post('/beritaa', [UserBeritaController::class, 'store'])->name('beritaa.store');
        Route::get('/beritaa/{id}/edit', [UserBeritaController::class, 'edit'])->name('beritaa.edit');
        Route::put('/beritaa/{id}', [UserBeritaController::class, 'update'])->name('beritaa.update');
        Route::delete('/beritaa/{id}', [UserBeritaController::class, 'destroy'])->name('beritaa.destroy');

        // --- Manajemen artikel ---
        Route::get('/artikell/dashboard', [UserArtikelController::class, 'dashboard'])->name('artikell.dashboard');
        Route::get('/artikell/create', [UserArtikelController::class, 'create'])->name('artikell.create');
        Route::post('/artikell', [UserArtikelController::class, 'store'])->name('artikell.store');
        Route::get('/artikell/{id}/edit', [UserArtikelController::class, 'edit'])->name('artikell.edit');
        Route::put('/artikell/{id}', [UserArtikelController::class, 'update'])->name('artikell.update');
        Route::delete('/artikell/{id}', [UserArtikelController::class, 'destroy'])->name('artikell.destroy');
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

        // --- Manajemen Visi Misi ---
        Route::get('/visi/dashboard', [AdminVisiController::class, 'dashboard'])->name('visi.dashboard');
        Route::get('/visi/create', [AdminVisiController::class, 'create'])->name('visi.create');
        Route::post('/visi', [AdminVisiController::class, 'store'])->name('visi.store');
        Route::get('/visi/{id}/edit', [AdminVisiController::class, 'edit'])->name('visi.edit');
        Route::put('/visi/{id}', [AdminVisiController::class, 'update'])->name('visi.update');
        Route::delete('/visi/{id}', [AdminVisiController::class, 'destroy'])->name('visi.destroy');

        // ... tupoksi
        Route::get('/tupoksii/dashboard', [AdminTupoksiController::class, 'dashboard'])->name('tupoksii.dashboard');
        Route::get('/tupoksii/create', [AdminTupoksiController::class, 'create'])->name('tupoksii.create');
        Route::post('/tupoksii', [AdminTupoksiController::class, 'store'])->name('tupoksii.store');
        Route::get('/tupoksii/{id}/edit', [AdminTupoksiController::class, 'edit'])->name('tupoksii.edit');
        Route::put('/tupoksii/{id}', [AdminTupoksiController::class, 'update'])->name('tupoksii.update');
        Route::delete('/tupoksii/{id}', [AdminTupoksiController::class, 'destroy'])->name('tupoksii.destroy');
        // ... uraian
        Route::get('/uraian/dashboard', [UraianController::class, 'dashboard'])->name('uraian.dashboard');
        Route::get('/uraian/create', [UraianController::class, 'create'])->name('uraian.create');
        Route::post('/uraian', [UraianController::class, 'store'])->name('uraian.store');
        Route::get('/uraian/{id}/edit', [uraianController::class, 'edit'])->name('uraian.edit');
        Route::put('/uraian/{id}', [UraianController::class, 'update'])->name('uraian.update');
        Route::delete('/uraian/{id}', [UraianController::class, 'destroy'])->name('uraian.destroy');

        Route::resource('/tentang_kami', AdminTentangController::class)->except(['index', 'show']);
        Route::get('/tentang_kami/dashboard', [AdminTentangController::class, 'dashboard'])->name('tentang_kami.dashboard');

        Route::resource('/struktur_', AdminStrukturController::class)->except(['index', 'show']);
        Route::get('/struktur_/dashboard', [AdminStrukturController::class, 'dashboard'])->name('struktur_.dashboard');

        Route::resource('/maklumat', AdminMaklumatController::class)->except(['index', 'show']);
        Route::get('/maklumat/dashboard', [AdminMaklumatController::class, 'dashboard'])->name('maklumat.dashboard');

        Route::resource('/profill', AdminProfilController::class)->except(['index', 'show']);
        Route::get('/profill/dashboard', [AdminProfilController::class, 'dashboard'])->name('profill.dashboard');

        Route::resource('/produk_hukum', AdminProdukHukumController::class)->except(['index', 'show']);
        Route::get('/produk_hukum/dashboard', [AdminProdukHukumController::class, 'dashboard'])->name('produk_hukum.dashboard');

        Route::resource('/produk_hukum_cont', AdminPHContController::class)->except(['index', 'show']);
        Route::get('/produk_hukum_cont/dashboard', [AdminPHContController::class, 'dashboard'])->name('produk_hukum_cont.dashboard');

        Route::resource('/pimpinan', AdminPimpinanController::class)->except(['index', 'show']);
        Route::get('/pimpinan/dashboard', [AdminPimpinanController::class, 'dashboard'])->name('pimpinan.dashboard');

        Route::resource('/sektorall', AdminSektoralController::class)->except(['index', 'show']);
        Route::get('/sektoral/dashboard', [AdminSektoralController::class, 'dashboard'])->name('sektorall.dashboard');

        Route::resource('/sektoral_cont', AdminSektoralContController::class)->except(['index', 'show']);
        Route::get('/sektoral_cont/dashboard', [AdminSektoralContController::class, 'dashboard'])->name('sektoral_cont.dashboard');

        Route::resource('/profil_cont', AdminProfilContController::class)->except(['index', 'show']);
        Route::get('/profil_cont/dashboard', [AdminProfilContController::class, 'dashboard'])->name('profil_cont.dashboard');

        Route::resource('/perencanaan', AdminPerencanaanController::class)->except(['index', 'show']);
        Route::get('/perencanaan/dashboard', [AdminPerencanaanController::class, 'dashboard'])->name('perencanaan.dashboard');

        Route::resource('/perencanaan_cont', AdminPerencanaanContController::class)->except(['index', 'show']);
        Route::get('/perencanaan_cont/dashboard', [AdminPerencanaanContController::class, 'dashboard'])->name('perencanaan_cont.dashboard');

        Route::resource('/evaluasi_cont', AdminEvaluasiContController::class)->except(['index', 'show']);
        Route::get('/evaluasi_cont/dashboard', [AdminEvaluasiContController::class, 'dashboard'])->name('evaluasi_cont.dashboard');

        Route::resource('/evaluasi', AdminEvaluasiController::class)->except(['index', 'show']);
        Route::get('/evaluasi/dashboard', [AdminEvaluasiController::class, 'dashboard'])->name('evaluasi.dashboard');

        Route::resource('/layanan_beranda', AdminLayananBerandaController::class)->except(['index', 'show']);
        Route::get('/layanan_beranda/dashboard', [AdminLayananBerandaController::class, 'dashboard'])->name('layanan_beranda.dashboard');
    });
});

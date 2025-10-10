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
use App\Http\Controllers\Admin\AdminKontenController;

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
Route::resource('/profilPimpinan', ProfilController::class)->only(['index', 'show']);
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
        Route::get('/beritaa/{berita}/edit', [UserBeritaController::class, 'edit'])
            ->name('beritaa.edit')
            ->middleware('can:update,berita');
        Route::put('/beritaa/{berita}', [UserBeritaController::class, 'update'])
            ->name('beritaa.update')
            ->middleware('can:update,berita');
        Route::delete('/beritaa/{berita}', [UserBeritaController::class, 'destroy'])
            ->name('beritaa.destroy')
            ->middleware('can:delete,berita');
        Route::get('/beritaa/{berita}', [UserBeritaController::class, 'show'])
            ->name('beritaa.show');

        // --- Manajemen artikel ---
        Route::get('/artikell/dashboard', [UserArtikelController::class, 'dashboard'])->name('artikell.dashboard');
        Route::get('/artikell/create', [UserArtikelController::class, 'create'])->name('artikell.create');
        Route::post('/artikell', [UserArtikelController::class, 'store'])->name('artikell.store');
        Route::get('/artikell/{artikel}/edit', [UserArtikelController::class, 'edit'])
            ->name('artikell.edit')
            ->middleware('can:update,artikel');
        Route::put('/artikell/{artikel}', [UserArtikelController::class, 'update'])
            ->name('artikell.update')
            ->middleware('can:update,artikel');
        Route::delete('/artikell/{artikel}', [UserArtikelController::class, 'destroy'])
            ->name('artikell.destroy')
            ->middleware('can:delete,artikel');
        Route::get('/artikell/{artikel}', [UserArtikelController::class, 'show'])
            ->name('artikell.show');
    });

    //------------------------------------------------------------------
    // B. RUTE KHUSUS UNTUK ROLE 'ADMIN'
    //------------------------------------------------------------------
    Route::middleware(['role:admin'])->group(function () {
        // --- Manajemen Layanan ---
        Route::get('/layanan/dashboard', [AdminLayananController::class, 'dashboard'])->name('layanan.dashboard');
        Route::resource('/layanan', AdminLayananController::class)->except(['index']);
        Route::get('/layanan/{layanan}/edit', [AdminLayananController::class, 'edit'])
            ->name('layanan.edit')
            ->middleware('can:update,layanan');
        Route::put('/layanan/{layanan}', [AdminLayananController::class, 'update'])
            ->name('layanan.update')
            ->middleware('can:update,layanan');
        Route::delete('/layanan/{layanan}', [AdminLayananController::class, 'destroy'])
            ->name('layanan.destroy')
            ->middleware('can:delete,layanan');
        Route::get('/layanan/{layanan}', [AdminLayananController::class, 'show'])
            ->name('layanan.show');

        // --- Manajemen Detail Layanan ---
        Route::get('/layanan_detail/dashboard', [LayananDetailController::class, 'dashboard'])->name('layanan_detail.dashboard');
        Route::resource('/layanan_detail', LayananDetailController::class)->except(['index']);
        Route::get('/layanan_detail/{layanan_detail}/edit', [LayananDetailController::class, 'edit'])
            ->name('layanan_detail.edit')
            ->middleware('can:update,layanan_detail');
        Route::put('/layanan_detail/{layanan_detail}', [LayananDetailController::class, 'update'])
            ->name('layanan_detail.update')
            ->middleware('can:update,layanan_detail');
        Route::delete('/layanan_detail/{layanan_detail}', [LayananDetailController::class, 'destroy'])
            ->name('layanan_detail.destroy')
            ->middleware('can:delete,layanan_detail');
        Route::get('/layanan_detail/{layanan_detail}', [LayananDetailController::class, 'show'])
            ->name('layanan_detail.show');

        // --- Manajemen Visi Misi ---
        Route::get('/visi/dashboard', [AdminVisiController::class, 'dashboard'])->name('visi.dashboard');
        Route::resource('/visi', AdminVisiController::class)->except(['index']);
        Route::get('/visi/{visi}/edit', [AdminVisiController::class, 'edit'])
            ->name('visi.edit')
            ->middleware('can:update,visi');
        Route::put('/visi/{visi}', [AdminVisiController::class, 'update'])
            ->name('visi.update')
            ->middleware('can:update,visi');
        Route::delete('/visi/{visi}', [AdminVisiController::class, 'destroy'])
            ->name('visi.destroy')
            ->middleware('can:delete,visi');
        Route::get('/visi/{visi}', [AdminVisiController::class, 'show'])
            ->name('visi.show');

        // ... tupoksi
        Route::get('/tupoksii/dashboard', [AdminTupoksiController::class, 'dashboard'])->name('tupoksii.dashboard');
        Route::resource('/tupoksii', AdminTupoksiController::class)->except(['index']);
        Route::get('/tupoksii/{tupoksii}/edit', [AdminTupoksiController::class, 'edit'])
            ->name('tupoksii.edit')
            ->middleware('can:update,tupoksii');
        Route::put('/tupoksii/{tupoksii}', [AdminTupoksiController::class, 'update'])
            ->name('tupoksii.update')
            ->middleware('can:update,tupoksii');
        Route::delete('/tupoksii/{tupoksii}', [AdminTupoksiController::class, 'destroy'])
            ->name('tupoksii.destroy')
            ->middleware('can:delete,tupoksii');
        Route::get('/tupoksii/{tupoksii}', [AdminTupoksiController::class, 'show'])
            ->name('tupoksii.show');
        // ... uraian
        Route::get('/uraian/dashboard', [UraianController::class, 'dashboard'])->name('uraian.dashboard');
        Route::resource('/uraian', UraianController::class)->except(['index']);
        Route::get('/uraian/{uraian}/edit', [UraianController::class, 'edit'])
            ->name('uraian.edit')
            ->middleware('can:update,uraian');
        Route::put('/uraian/{uraian}', [UraianController::class, 'update'])
            ->name('uraian.update')
            ->middleware('can:update,uraian');
        Route::delete('/uraian/{uraian}', [UraianController::class, 'destroy'])
            ->name('uraian.destroy')
            ->middleware('can:delete,uraian');
        Route::get('/uraian/{uraian}', [UraianController::class, 'show'])
            ->name('uraian.show');


        Route::get('/tentang_kami/dashboard', [AdminTentangController::class, 'dashboard'])->name('tentang_kami.dashboard');
        Route::resource('/tentang_kami', AdminTentangController::class)->except(['index']);
        Route::get('/tentang_kami/{tentang_kami}/edit', [AdminTentangController::class, 'edit'])
            ->name('tentang_kami.edit')
            ->middleware('can:update,tentang_kami');
        Route::put('/tentang_kami/{tentang_kami}', [AdminTentangController::class, 'update'])
            ->name('tentang_kami.update')
            ->middleware('can:update,tentang_kami');
        Route::delete('/tentang_kami/{tentang_kami}', [AdminTentangController::class, 'destroy'])
            ->name('tentang_kami.destroy')
            ->middleware('can:delete,tentang_kami');
        Route::get('/tentang_kami/{tentang_kami}', [AdminTentangController::class, 'show'])
            ->name('tentang_kami.show');

        //struktur
        Route::get('/strukturr/dashboard', [AdminStrukturController::class, 'dashboard'])->name('strukturr.dashboard');
        Route::resource('/strukturr', AdminStrukturController::class)->except(['index']);
        Route::get('/strukturr/{strukturr}/edit', [AdminStrukturController::class, 'edit'])
            ->name('strukturr.edit')
            ->middleware('can:update,strukturr');
        Route::put('/strukturr/{strukturr}', [AdminStrukturController::class, 'update'])
            ->name('strukturr.update')
            ->middleware('can:update,strukturr');
        Route::delete('/strukturr/{struktur}', [AdminStrukturController::class, 'destroy'])
            ->name('strukturr.destroy')
            ->middleware('can:delete,strukturr');
        Route::get('/strukturr/{strukturr}', [AdminStrukturController::class, 'show'])
            ->name('strukturr.show');
        //maklumat
        Route::get('/maklumat/dashboard', [AdminMaklumatController::class, 'dashboard'])->name('maklumat.dashboard');
        Route::resource('/maklumat', AdminMaklumatController::class)->except(['index']);
        Route::get('/maklumat/{maklumat}/edit', [AdminMaklumatController::class, 'edit'])
            ->name('maklumat.edit')
            ->middleware('can:update,maklumat');
        Route::put('/maklumat/{maklumat}', [AdminMaklumatController::class, 'update'])
            ->name('maklumat.update')
            ->middleware('can:update,maklumat');
        Route::delete('/maklumat/{maklumat}', [AdminMaklumatController::class, 'destroy'])
            ->name('maklumat.destroy')
            ->middleware('can:delete,maklumat');
        Route::get('/maklumat/{maklumat}', [AdminMaklumatController::class, 'show'])
            ->name('maklumat.show');

        Route::get('/profil/dashboard', [AdminProfilController::class, 'dashboard'])->name('profil.dashboard');
        Route::resource('/profil', AdminProfilController::class)->except(['index']);
        Route::get('/profil/{profil}/edit', [AdminProfilController::class, 'edit'])
            ->name('profil.edit')
            ->middleware('can:update,profil');
        Route::put('/profil/{profil}', [AdminProfilController::class, 'update'])
            ->name('profil.update')
            ->middleware('can:update,profil');
        Route::delete('/profil/{profil}', [AdminProfilController::class, 'destroy'])
            ->name('profil.destroy')
            ->middleware('can:delete,profil');
        Route::get('/profil/{profil}', [AdminProfilController::class, 'show'])
            ->name('profil.show');


        Route::get('/produk_hukum/dashboard', [AdminProdukHukumController::class, 'dashboard'])->name('produk_hukum.dashboard');
        Route::resource('/produk_hukum', AdminProdukHukumController::class)->except(['index']);
        Route::get('/produk_hukum/{produk_hukum}/edit', [AdminProdukHukumController::class, 'edit'])
            ->name('produk_hukum.edit')
            ->middleware('can:update,produk_hukum');
        Route::put('/produk_hukum/{produk_hukum}', [AdminProdukHukumController::class, 'update'])
            ->name('produk_hukum.update')
            ->middleware('can:update,produk_hukum');
        Route::delete('/produk_hukum/{produk_hukum}', [AdminProdukHukumController::class, 'destroy'])
            ->name('produk_hukum.destroy')
            ->middleware('can:delete,produk_hukum');
        Route::get('/produk_hukum/{produk_hukum}', [AdminProdukHukumController::class, 'show'])
            ->name('produk_hukum.show');

        Route::resource('/produk_hukum_cont', AdminPHContController::class)->except(['index', 'show']);
        Route::get('/produk_hukum_cont/dashboard', [AdminPHContController::class, 'dashboard'])->name('produk_hukum_cont.dashboard');

        Route::get('/pimpinan/dashboard', [AdminPimpinanController::class, 'dashboard'])
        ->name('pimpinan.dashboard');
        Route::resource('/pimpinan', AdminPimpinanController::class)->except(['index']);
        Route::get('/pimpinan/{pimpinan}/edit', [AdminPimpinanController::class, 'edit'])
            ->name('pimpinan.edit')
            ->middleware('can:update,pimpinan');
        Route::put('/pimpinan/{pimpinan}', [AdminPimpinanController::class, 'update'])
            ->name('pimpinan.update')
            ->middleware('can:update,pimpinan');
        Route::delete('/pimpinan/{pimpinan}', [AdminPimpinanController::class, 'destroy'])
            ->name('pimpinan.destroy')
            ->middleware('can:delete,pimpinan');
        Route::get('/pimpinan/{pimpinan}', [AdminPimpinanController::class, 'show'])
            ->name('pimpinan.show');

        Route::resource('/sektorall', AdminSektoralController::class)->except(['index', 'show']);
        Route::get('/sektoral/dashboard', [AdminSektoralController::class, 'dashboard'])->name('sektorall.dashboard');

        Route::resource('/sektoral_cont', AdminSektoralContController::class)->except(['index', 'show']);
        Route::get('/sektoral_cont/dashboard', [AdminSektoralContController::class, 'dashboard'])->name('sektoral_cont.dashboard');

        Route::resource('/profil_cont', AdminProfilContController::class)->except(['index', 'show']);
        Route::get('/profil_cont/dashboard', [AdminProfilContController::class, 'dashboard'])->name('profil_cont.dashboard');


        Route::get('/perencanaan/dashboard', [AdminPerencanaanController::class, 'dashboard'])->name('perencanaan.dashboard');
        Route::resource('/perencanaan', AdminPerencanaanController::class)->except(['index']);
        Route::get('/perencanaan/{perencanaan}/edit', [AdminPerencanaanController::class, 'edit'])
            ->name('perencanaan.edit')
            ->middleware('can:update,perencanaan');
        Route::put('/perencanaan/{perencanaan}', [AdminPerencanaanController::class, 'update'])
            ->name('perencanaan.update')
            ->middleware('can:update,perencanaan');
        Route::delete('/perencanaan/{perencanaan}', [AdminPerencanaanController::class, 'destroy'])
            ->name('perencanaan.destroy')
            ->middleware('can:delete,perencanaan');
        Route::get('/perencanaan/{perencanaan}', [AdminPerencanaanController::class, 'show'])
            ->name('perencanaan.show');

        Route::resource('/perencanaan_cont', AdminPerencanaanContController::class)->except(['index', 'show']);
        Route::get('/perencanaan_cont/dashboard', [AdminPerencanaanContController::class, 'dashboard'])->name('perencanaan_cont.dashboard');

        Route::resource('/evaluasi_cont', AdminEvaluasiContController::class)->except(['index', 'show']);
        Route::get('/evaluasi_cont/dashboard', [AdminEvaluasiContController::class, 'dashboard'])->name('evaluasi_cont.dashboard');

        //dokumen Evaluasi
        Route::get('/evaluasi/dashboard', [AdminEvaluasiController::class, 'dashboard'])->name('evaluasi.dashboard');
        Route::resource('/evaluasi', AdminEvaluasiController::class)->except(['index']);
        Route::get('/evaluasi/{evaluasi}/edit', [AdminEvaluasiController::class, 'edit'])
            ->name('evaluasi.edit')
            ->middleware('can:update,evaluasi');
        Route::put('/evaluasi/{evaluasi}', [AdminEvaluasiController::class, 'update'])
            ->name('evaluasi.update')
            ->middleware('can:update,evaluasi');
        Route::delete('/evaluasi/{evaluasi}', [AdminEvaluasiController::class, 'destroy'])
            ->name('evaluasi.destroy')
            ->middleware('can:delete,evaluasi');
        Route::get('/evaluasi/{evaluasi}', [AdminEvaluasiController::class, 'show'])
            ->name('evaluasi.show');

        //konten
        Route::get('/konten/dashboard', [AdminKontenController::class, 'dashboard'])->name('konten.dashboard');
        Route::resource('/konten', AdminKontenController::class)->except(['index']);
        Route::get('/konten/{konten}/edit', [AdminKontenController::class, 'edit'])
            ->name('konten.edit')
            ->middleware('can:update,konten');
        Route::put('/konten/{konten}', [AdminKontenController::class, 'update'])
            ->name('konten.update')
            ->middleware('can:update,konten');
        Route::delete('/konten/{konten}', [AdminKontenController::class, 'destroy'])
            ->name('konten.destroy')
            ->middleware('can:delete,konten');
        Route::get('/konten/{konten}', [AdminKontenController::class, 'show'])
            ->name('konten.show');

        Route::resource('/layanan_beranda', AdminLayananBerandaController::class)->except(['index', 'show']);
        Route::get('/layanan_beranda/dashboard', [AdminLayananBerandaController::class, 'dashboard'])->name('layanan_beranda.dashboard');
    });
});

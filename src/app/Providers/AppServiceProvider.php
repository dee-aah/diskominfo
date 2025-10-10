<?php

namespace App\Providers;

use App\Models\Artikel;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use App\Models\Berita;
use App\Models\Evaluasi;
use App\Models\Konten;
use App\Models\Layanan;
use App\Models\LayananDetail;
use App\Models\Maklumat;
use App\Models\Perencanaan;
use App\Models\ProdukHukum;
use App\Models\Profil;
use App\Models\SambutanPimpinan;
use App\Models\Struktur;
use App\Models\Tentang;
use App\Models\Tupoksi;
use App\Models\UraianTugas;
use App\Policies\ArtikelPolicy;
use App\Policies\BeritaPolicy;
use App\Policies\EvaluasiPolicy;
use App\Policies\KontenPolicy;
use App\Policies\LayananDetailPolicy;
use App\Policies\LayananPolicy;
use App\Policies\MaklumatPolicy;
use App\Policies\PerencanaanPolicy;
use App\Policies\ProdukHukumPolicy;
use App\Policies\ProfilPolicy;
use App\Policies\SambutanPolicy;
use App\Policies\StrukturPolicy;
use App\Policies\TentangPolicy;
use App\Policies\TupoksiPolicy;
use App\Policies\UraianPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('id');
        Gate::policy(Berita::class, BeritaPolicy::class);
        Gate::policy(Artikel::class, ArtikelPolicy::class);

        Gate::policy(SambutanPimpinan::class, SambutanPolicy::class);
        Gate::policy(Tentang::class, TentangPolicy::class);
        Gate::policy(Profil::class, ProfilPolicy::class);
        Gate::policy(Tupoksi::class, TupoksiPolicy::class);
        Gate::policy(UraianTugas::class, UraianPolicy::class);
        Gate::policy(Maklumat::class, MaklumatPolicy::class);
        Gate::policy(Layanan::class, LayananPolicy::class);
        Gate::policy(LayananDetail::class, LayananDetailPolicy::class);
        Gate::policy(ProdukHukum::class, ProdukHukumPolicy::class);
        Gate::policy(Perencanaan::class, PerencanaanPolicy::class);
        Gate::policy(Evaluasi::class, EvaluasiPolicy::class);
        Gate::policy(Konten::class, KontenPolicy::class);
        Gate::policy(Struktur::class, StrukturPolicy::class);
        Gate::policy(Tentang::class, TentangPolicy::class);
    }
}

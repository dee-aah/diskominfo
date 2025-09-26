<?php

namespace App\Providers;

use App\Models\Artikel;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use App\Models\Berita;
use App\Models\Maklumat;
use App\Models\Profil;
use App\Models\SambutanPimpinan;
use App\Models\Tentang;
use App\Models\Tupoksi;
use App\Models\UraianTugas;
use App\Policies\ArtikelPolicy;
use App\Policies\BeritaPolicy;
use App\Policies\MaklumatPolicy;
use App\Policies\ProfilPolicy;
use App\Policies\SambutanPolicy;
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
    }
}

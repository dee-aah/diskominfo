<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

// Models
use App\Models\Artikel;
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

// Policies
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

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Artikel::class          => ArtikelPolicy::class,
        Berita::class           => BeritaPolicy::class,
        Evaluasi::class         => EvaluasiPolicy::class,
        Konten::class           => KontenPolicy::class,
        Layanan::class          => LayananPolicy::class,
        LayananDetail::class    => LayananDetailPolicy::class,
        Maklumat::class         => MaklumatPolicy::class,
        Perencanaan::class      => PerencanaanPolicy::class,
        ProdukHukum::class      => ProdukHukumPolicy::class,
        Profil::class           => ProfilPolicy::class,
        SambutanPimpinan::class => SambutanPolicy::class,
        Struktur::class         => StrukturPolicy::class,
        Tentang::class          => TentangPolicy::class,
        Tupoksi::class          => TupoksiPolicy::class,
        UraianTugas::class      => UraianPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}

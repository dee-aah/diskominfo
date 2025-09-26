<?php

namespace App\Providers;

use App\Models\Artikel;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use App\Models\Berita;
use App\Policies\ArtikelPolicy;
use App\Policies\BeritaPolicy;
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
    }
}

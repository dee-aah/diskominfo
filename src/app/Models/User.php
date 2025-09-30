<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */


    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }
    public function artikels()
    {
        return $this->hasMany(Artikel::class);
    }
    public function evaluasis()
    {
        return $this->hasMany(Evaluasi::class);
    }
    public function layanan_details()
    {
        return $this->hasMany(LayananDetail::class);
    }
    public function layanans()
    {
        return $this->hasMany(Layanan::class);
    }
    public function layanan_berandas()
    {
        return $this->hasMany(LayananBeranda::class);
    }
    public function maklumats()
    {
        return $this->hasMany(Maklumat::class);
    }
    public function perencanaans()
    {
        return $this->hasMany(Perencanaan::class);
    }
    public function produk_hukums()
    {
        return $this->hasMany(ProdukHukum::class);
    }
    public function profils()
    {
        return $this->hasMany(Profil::class);
    }
    public function sambutan_pimpinans()
    {
        return $this->hasMany(SambutanPimpinan::class);
    }
    public function sektorals()
    {
        return $this->hasMany(Sektoral::class);
    }
    public function strukturs()
    {
        return $this->hasMany(Struktur::class);
    }
    public function tentangs()
    {
        return $this->hasMany(Tentang::class);
    }
    public function tupoksis()
    {
        return $this->hasMany(Tupoksi::class);
    }
    public function uraian_tugass()
    {
        return $this->hasMany(UraianTugas::class);
    }
    public function visi_misis()
    {
        return $this->hasMany(Visimisi::class);
    }
    public function Kontens()
    {
        return $this->hasMany(Konten::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

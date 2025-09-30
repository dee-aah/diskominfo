<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'beritas';
    protected $casts = [
    'waktu' => 'datetime',
    ];
    public function getRouteKeyName()
{
    return 'slug';
}

    // app/Models/Berita.php
    protected $fillable = ['judul', 'deskripsi', 'penulis','slug','kategori', 'tag', 'img','waktu','view_count', 'user_id'];


    // Relasi ke kategori
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //slug otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($beritas) {
            if (empty($beritas->slug)) {
                $beritas->slug = Str::slug($beritas->judul);
            }
        });

        static::updating(function ($beritas) {
            if ($beritas->isDirty('judul')) {
                $beritas->slug = Str::slug($beritas->judul);
            }
        });
    }
}

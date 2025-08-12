<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'beritas';
    protected $casts = [
    'waktu' => 'datetime',
    ];

    // app/Models/Berita.php
    protected $fillable = ['judul', 'deskripsi', 'penulis','slug', 'tag', 'gambar','waktu','view_count', 'kategori_id'];


    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}

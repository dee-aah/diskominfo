<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
   protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'penulis',
        'tag',
        'gambar',
        'kategori_id',
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}

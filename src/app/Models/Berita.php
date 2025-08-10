<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
   use HasFactory;
    protected $table = 'beritas';

    // app/Models/Berita.php
protected $fillable = ['judul', 'deskripsi', 'penulis', 'tag', 'gambar', 'kategori_id'];


    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}

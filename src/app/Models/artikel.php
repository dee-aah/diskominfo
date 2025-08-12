<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikels';
    protected $casts = [
    'waktu' => 'datetime',
    ];
    protected $fillable = ['judul', 'deskripsi', 'penulis', 'tag','slug','waktu', 'gambar','kategori_id'];
    public function Kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}

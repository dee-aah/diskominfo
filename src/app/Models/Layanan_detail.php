<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan_detail extends Model
{
    protected $fillable = [
    'layanan_id',
    'jenis',
    'deskripsi',
    'gambar'
    ];

    // Relasi ke Service
    public function layanans()
    {
        return $this->belongsTo(Layanan::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan_detail extends Model
{
    protected $fillable = [
    'layanan_id',
    'jenis',
    'isi_1',
    'isi_2',
    'isi_3',
    'isi_4',
    'isi_5',
    'gambar'
    ];

    // Relasi ke Service
    public function layanans()
    {
        return $this->belongsTo(Layanan::class);
    }
}

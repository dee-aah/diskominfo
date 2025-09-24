<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan_detail extends Model
{
    protected $fillable = [
    'layanan_id',
    'jenis',
    'deskripsi',
    'img',
    'user_id'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Relasi ke Service
    public function layanans()
    {
        return $this->belongsTo(Layanan::class);
    }
}

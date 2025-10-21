<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Layanan extends Model
{
    protected $fillable = [
        'program', 'nama', 'slug', 'deskripsi','deskripsi_singkat', 'img','user_id'
    ];

    // Relasi ke ServiceDetail
    public function layanan_details()
    {
        return $this->hasMany(LayananDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    // Auto-generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($layanan) {
            if (empty($layanan->slug)) {
                $layanan->slug = Str::slug($layanan->nama);
            }
        });

        static::updating(function ($layanan) {
            if ($layanan->isDirty('nama')) {
                $layanan->slug = Str::slug($layanan->nama);
            }
        });
    }
}

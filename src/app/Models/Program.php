<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Program extends Model
{
    protected $fillable = [
        'nama', 'slug', 'deskripsi', 'gambar', 'urutan'
    ];

    // Relasi ke Service
    public function services()
    {
        return $this->hasMany(Layanan::class);
    }

    // Auto-generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($program) {
            if (empty($program->slug)) {
                $program->slug = Str::slug($program->nama);
            }
        });

        static::updating(function ($program) {
            if ($program->isDirty('nama')) {
                $program->slug = Str::slug($program->nama);
            }
        });
    }
}

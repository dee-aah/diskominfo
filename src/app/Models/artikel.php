<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikels';
    protected $casts = [
        'waktu' => 'datetime',
    ];
    protected $fillable = ['judul', 'deskripsi', 'penulis', 'tag', 'slug', 'waktu', 'img', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($artikels) {
            if (empty($artikels->slug)) {
                $artikels->slug = Str::slug($artikels->judul);
            }
        });

        static::updating(function ($artikels) {
            if ($artikels->isDirty('judul')) {
                $artikels->slug = Str::slug($artikels->judul);
            }
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = ['nama'];

    // Relasi ke berita
    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }
}

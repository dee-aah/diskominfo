<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class artikel extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'isi', 'penulis', 'tag', 'gambar'];
}

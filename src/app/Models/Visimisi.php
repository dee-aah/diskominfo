<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visimisi extends Model
{
    protected $fillable = [
        'des_singkat','visi', 'misi', 'gambar'
    ];
}

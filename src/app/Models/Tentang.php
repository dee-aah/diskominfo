<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $fillable = [
        'des_singkat', 'deskripsi','gambar','gambar_cont'
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tupoksi extends Model
{
    protected $fillable = [
        'des_singkat', 'tugas_utama', 'fungsi_utama', 'gambar'
    ];
}

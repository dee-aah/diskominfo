<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perencanaan extends Model
{
    protected $fillable =['des_singkat',
            'img_konten',
            'nama',
            'img_pdf'];
}

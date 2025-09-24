<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SambutanPimpinan extends Model
{
    protected $fillable = [
        'nama','deskripsi','img','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

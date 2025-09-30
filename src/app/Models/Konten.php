<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    protected $fillable = [
        'img','nama','deskripsi','video','user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

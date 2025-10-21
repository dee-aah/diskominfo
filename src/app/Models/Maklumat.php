<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maklumat extends Model
{
    protected $fillable = [
        'deskripsi','img','user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

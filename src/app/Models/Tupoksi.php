<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tupoksi extends Model
{
    protected $fillable = [
         'tugas', 'fungsi','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

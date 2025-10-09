<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $table = 'tentangs';
    protected $fillable = [
        'deskripsi','img','user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

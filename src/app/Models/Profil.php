<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
        'img','nama','jabatan','user_id'
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

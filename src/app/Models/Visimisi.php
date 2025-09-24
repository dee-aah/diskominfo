<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visimisi extends Model
{
    protected $fillable = [
        'user_id','visi', 'misi', 'img'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

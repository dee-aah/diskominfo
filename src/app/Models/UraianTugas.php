<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UraianTugas extends Model
{
    protected $fillable = [
        'bidang', 'uraian','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

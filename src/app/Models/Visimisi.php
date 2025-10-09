<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visimisi extends Model
{
    protected $table = 'visi_misis';
    protected $fillable = [
        'user_id','visi', 'misi'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

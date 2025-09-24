<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananBeranda extends Model
{
    protected $fillable =[
            'nama','link','deskripsi','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

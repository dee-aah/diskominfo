<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perencanaan extends Model
{
    protected $fillable =[
            'nama','link', 'img_pdf','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

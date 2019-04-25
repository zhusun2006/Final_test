<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //
    protected $fillable = [
        'name', 'user_id', 'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

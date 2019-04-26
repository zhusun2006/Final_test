<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //
    protected $fillable = [
        'title', 'user_id', 'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

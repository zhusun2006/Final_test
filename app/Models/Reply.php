<?php

namespace App\Models;

class Reply extends Model
{
    protected $fillable = ['content','kind','title','user_id','sender_id','admin_reply'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

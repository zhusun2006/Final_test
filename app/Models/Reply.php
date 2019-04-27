<?php

namespace App\Models;

class Reply extends Model
{
    protected $fillable = ['content','kind','title','user_id','sender_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notice()
    {
        return $this->belongsTo(Notifications::class);
    }
}

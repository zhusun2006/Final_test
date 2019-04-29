<?php
namespace App\Models;

class Notification extends Model
{
    protected $fillable = [
        'content', 'sender', 'achiever','datetime','kind','title','reply_id','admin_reply'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reply()
    {
        return $this->belongsTo(Reply::class);
    }
}

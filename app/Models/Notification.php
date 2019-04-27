<?php
namespace App\Models;

class Notification extends Model
{
    protected $fillable = [
        'content', 'sender', 'achiever','datetime','kind','title','reply_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

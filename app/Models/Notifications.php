<?php
namespace App\Models;

class Notifications extends Model
{
    protected $fillable = [
        'content', 'sender', 'achiever','datetime','kind'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

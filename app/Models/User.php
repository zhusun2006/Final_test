<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Auth;

class User extends Authenticatable implements MustVerifyEmailContract
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar','password','position','department','tel','notification_count','arrangement','remember_thing'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $attributes = [
        'position' => '游客',
        'department' => '来访者',
        'avatar' => 'http://www.gravatar.com/avatar/$hash3s=$size',
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

}

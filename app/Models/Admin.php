<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
	protected $fillable = [  //定义可修改的数据
        'name', 'user_id','position','department'
    ];
}

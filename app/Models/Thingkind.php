<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thingkind extends Model
{
    //
	protected $fillable = [  //定义可修改的数据
        'name', 'description',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //数据表名称
    protected $table = 'messages';

    //可写字段
    protected $fillable = [
        'name', 'content',
    ];
}

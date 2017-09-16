<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //数据表名称
    protected $table = 'todos';

    //可写字段
    protected $fillable = [
        'content',
    ];
}

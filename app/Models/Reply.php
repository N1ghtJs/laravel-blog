<?php
// 文章评论-回复表模型文件

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //数据表名称
    protected $table = 'replys';

    //可写字段
    protected $fillable = [
        'user_id','comment_id','content',
    ];
}

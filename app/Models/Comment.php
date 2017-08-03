<?php
// 文章评论表模型文件

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //数据表名称
    protected $table = 'comments';

    //可写字段
    protected $fillable = [
        'article_id','user_id', 'content',
    ];

    //模型关联：获取该评论所属的用户模型
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //模型关联：获取该评论所属的文章模型
    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }

    //模型关联：获取该评论的所有回复
    public function replys()
    {
        return $this->hasMany('App\Models\Reply');
    }
}

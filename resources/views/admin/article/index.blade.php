@extends('admin.admin')

@section('title', '文章列表')

@section('content')
<a href="{{ route('article.create') }}" class="btn btn-default"><span class="glyphicon glyphicon-plus"> 添加文章</span></a>
<table class="z-table">
    <tr>
        <th>标题</th>
        <th>简介</th>
        <th>操作</th>
    </tr>
    @foreach ($articles as $article)
        <tr>
            <td><a href="{{ route('article.edit', $article->id) }}">{{ $article->title }}</a></td>
            <td>{{ $article->intro }}</td>
            <td>
                <!-- 隐藏按钮 -->
                @if( $article->hidden == 0)
                    <a href="{{ route('article.hidden', $article->id) }}" style="display: inline-block;" title="隐藏"><span class="glyphicon glyphicon-eye-close" style="color:gray"></span></a>
                @else
                    <a href="{{ route('article.hidden', $article->id) }}" style="display: inline-block;" title="隐藏"><span class="glyphicon glyphicon-eye-close" style="color: #F08080;"></span></a>
                @endif
                <!-- 删除按钮 -->
                <button type="submit" style="color: #F08080;background-color: transparent;border: none;padding:0" data-toggle="modal" data-target="#deleteArticle{{ $article->id }}" title="删除"><span class="glyphicon glyphicon-minus-sign"></span></button>
                <!-- 删除按钮：弹出框 -->
                <div class="modal fade" id="deleteArticle{{ $article->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content" style="text-align:center">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">确认删除该文章吗？</h4>
                      </div>
                      <div class="modal-body">
                          <form action="{{ route('article.destroy', $article->id) }}" method="post" style="display: inline-block;">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-danger">删除</button>
                          </form>
                          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                      </div>
                    </div>
                  </div>
                </div>
            </td>
        </tr>
    @endforeach
</table>

{{ $articles->render() }}
@endsection

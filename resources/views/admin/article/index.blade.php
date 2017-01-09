@extends('admin.admin')

@section('title', '文章列表')

@section('content')
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
                <!-- 编辑按钮 -->
                <a href="{{ route('article.edit', $article->id) }}" style="display: inline-block;"><span class="glyphicon glyphicon-edit"></span></a>
                <!-- 删除按钮 -->
                <form action="{{ route('article.destroy', $article->id) }}" method="post" style="display: inline-block;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" style="color: #F08080;background-color: transparent;border: none;"><span class="glyphicon glyphicon-minus-sign"></span></button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{{ $articles->render() }}
@endsection

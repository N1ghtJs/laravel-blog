@extends('admin.admin')

@section('title', '编辑文章')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>编辑文章</h3>

            @include('shared.errors')

            {{--新增文章表单--}}
            <form action="{{ route('article.update', $article->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <input type="text" class="form-control" name="title" placeholder="请填写标题" value="{{ $article->title }}" style="margin-bottom: 20px;">
                <input type="text" class="form-control" name="intro" placeholder="请填写简介" value="{{ $article->intro }}" style="margin-bottom: 20px;">
                <textarea name="content" rows="20" style="width:100%;">{{ $article->content }}</textarea>
                <div class="form-group">
                    <label for="cover">更新封面图片</label>
                    <input type="file" name="cover">
                </div>
                <button type="submit" class="btn btn-default">保存</button>
            </form>

        </div>
    </div>
</div>
@endsection

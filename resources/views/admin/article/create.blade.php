@extends('admin.admin')

@section('title', '新建文章')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>新增一篇文章</h3>

            @include('shared.errors')

            {{--新增文章表单--}}
            <form action="{{ route('article.store') }}" method="post">
                {{ csrf_field() }}
                <input type="text" class="form-control" name="title" placeholder="请填写标题" style="margin-bottom: 20px;">
                <input type="text" class="form-control" name="intro" placeholder="请填写简介" style="margin-bottom: 20px;">
                <textarea name="content" rows="20" style="width:100%;"></textarea>
                <!-- <div class="form-group" style="margin-top: 20px;">
                    <label for="picture">上传封面图片</label>
                    <input type="file" id="picture" name="picture">
                </div> -->
                <button type="submit" class="btn btn-default">完成</button>
            </form>

        </div>
    </div>
</div>
@endsection

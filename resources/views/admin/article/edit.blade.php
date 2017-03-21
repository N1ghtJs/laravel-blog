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
                <!-- 编辑框 -->
                <div>
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#editTab" aria-controls="editTab" role="tab" data-toggle="tab">编辑</a></li>
                    <li role="presentation"><a href="#previewTab" aria-controls="previewTab" role="tab" data-toggle="tab" id="previewButton">预览</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="editTab">
                        <textarea class="z-textarea" name="content" rows="20" style="width:100%;">{{ $article->content }}</textarea>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="previewTab">
                        <div class="z-textarea-preview markdown">
                            预览
                        </div>
                    </div>
                  </div>
                </div>
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

@section('scripts')
<script type="text/javascript">
//标签页JS
$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

//Markdown AJAX 解析
$('#previewButton').click(function (){
    //console.log($('.z-textarea').val())
    $('.z-textarea-preview').html('loading...');
    //AJAX 解析
    $.ajax({
        url: "{{ route('markdown') }}",
        type: "get",
        data: {
            content:$('.z-textarea').val()
        },
        success: function(res){
            //console.log(res);
            $('.z-textarea-preview').html(res);
        },
        error: function(err){
            console.log(err.responseText);
        }
    });
})
</script>
@endsection

@extends('emails.email')

@section('content')
    <a href="{{ route('article.show',$data['article_id']) }}">点此查看</a>
@endsection

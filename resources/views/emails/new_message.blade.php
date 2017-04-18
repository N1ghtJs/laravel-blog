@extends('emails.email')

@section('content')
    <a href="{{ route('messages.index') }}">点此查看</a>
@endsection

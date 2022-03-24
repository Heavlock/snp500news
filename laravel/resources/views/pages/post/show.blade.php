@extends('post')

@section('title'){{$post->title.' - '.config('app.name')}}@endsection
@section('description'){{$post->description}}@endsection

@section('content')
    <div class="mt-5">
        <h1>{{$post->h1}}</h1>
        <hr>
        {!! $body !!}
    </div>
@endsection

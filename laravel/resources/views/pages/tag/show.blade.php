@extends('post')

@section('title'){{$tag->title .' - '.config('app.name')}}@endsection
@section('description'){{trim($tag->title).'. '.'Новостной портал SNP500 - финансовая информация с Американских и Европейских рынков'}}@endsection
@section('content')
    <div>
        <h1>{{$tag->title}}</h1>
        @include('parts.postThumb')
    </div>
    <div class="m-5">
        {{$posts->links()}}
        {{--        {!! $posts->render() !!}--}}
    </div>
@endsection

@extends('post')
@section('content')
    <h1 class="m-5 text-center">Результат поиска: "{{$searchRequest['search']}}"</h1>
    <div class="row">
        @include('parts.postThumb')
    </div>
    <div class="m-5">
        {{$posts->appends(['search'=>request()->search])->links()}}
    </div>
@endsection

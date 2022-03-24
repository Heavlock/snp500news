@extends('post')
@section('content')
    <h1 class="m-5 text-center">Финансовые новости - список статей</h1>
    <div class="row">
        @include('parts.postThumb')
    </div>
    <div class="m-5">
        {{$posts->links()}}
    </div>
@endsection

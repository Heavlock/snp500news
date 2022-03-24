@extends('post')
@section('content')
    <h1 class="m-5 text-center">Финансовые новости - темы</h1>
    <div class="row justify-content-center">
        @forelse($tags as $tag)
            <div class="col-md-5 badge-secondary badge-info m-2 tag-index-wrap">
                <h2><a class="text-white"
                       href="/tags/{{$tag->slug}}">{{mb_strlen($tag->title)<26?$tag->title :mb_substr($tag->title,0,25).'...'}}</a>
                </h2>
            </div>
        @empty
            <p>Пока еще нет тегов</p>
        @endforelse
    </div>
    <div class="m-5">
        {{$tags->links()}}
    </div>
@endsection

<div class="row mb-2">
    {{--    posts   --}}

    @foreach($posts as $post)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm">
                <div class="card-body d-flex flex-column align-items-start">
                    @if($post->tags->isNotEmpty())
                        @foreach($post->tags as $tag)
                            <a class="badge badge-secondary" href="/tags/{{$tag->slug}}">{{$tag->title}}</a>
                        @endforeach
                    @endif
                    <h3 class="mb-0">
                        <a class="text-dark" href="/posts/{{$post->slug.(!empty($post->index)?'_indid_'.$post->index:'')}}">{{mb_substr($post->h1,0,25).'...'}}</a>
                    </h3>
                    <div class="mb-1 text-muted">{{$post->updated_at->toFormattedDateString()}}</div>
                    <p class="card-text mb-auto"> @if($body = json_decode($post->body,1))
                            {{mb_substr($body[0],0,100).'...'}}
                        @endif</p>
                    <a href="/posts/{{$post->slug}}">Продолжить чтение</a>
                </div>
                <img class="card-img-right flex-auto d-none d-lg-block"
                     {{--                     data-src="holder.js/200x250?theme=thumb"--}}
                     src="/img/finances.jpg"
                     alt="finance news">
            </div>
        </div>
    @endforeach

</div>

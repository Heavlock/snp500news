<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<rss xmlns:rambler="http://news.rambler.ru" version="2.0">
    <channel>
        <title>Российские новости</title>
        <link>{{config('app.url')}}</link>
        <description>SnP 500 Финансовые новости Европы и Америки</description>
        <language>ru</language>
        @foreach($posts as $post)
            <item>
                <title>{{trim($post->h1)}}</title>
                <link>{{config('app.url').'/posts/'.$post->slug}}</link>
                <description>{{trim($post->description)}}</description>
                <category>{{trim($post->tags[0]->title)}}</category>
                <rambler:fulltext>{!!'<![CDATA[' !!}@foreach(json_decode($post->body,true) as $paragraph){!! '<p>' !!}{{trim($paragraph)}}{!! '</p>' !!}@endforeach{!! ']]>' !!}</rambler:fulltext>
                <pubDate>{{\Carbon\Carbon::parse($post->updated_at)->format('D, d M Y H:i:s +0300')}}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>

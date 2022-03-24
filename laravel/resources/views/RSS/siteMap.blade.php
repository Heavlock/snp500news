<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{config('app.url')}}/posts</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{config('app.url')}}/tags</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{config('app.url')}}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    {!!$posts!!}
    {!!$tags!!}
</urlset>

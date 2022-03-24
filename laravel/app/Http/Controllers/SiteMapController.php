<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class SiteMapController extends Controller
{
    function index()
    {
        $result = cache()->remember('siteMap', 1000, function () {
            $tags = '';
            $posts = '';
            $siteUrl = config('app.url');
            foreach (Tag::latest()->get() as $tag) {
                $slug = $tag->slug;
                $updatedTime = $tag->updated_at->tz('GMT')->toAtomString();
                $tags .= "
                <url>
                    <loc>$siteUrl/tags/$slug</loc>
                    <lastmod>$updatedTime</lastmod>
                    <changefreq>monthly</changefreq>
                    <priority>0.5</priority>
                </url>
                ";
            }
            foreach (Post::latest()->get() as $post) {
                $slug = $post->slug;
                $updatedTime = $post->updated_at->tz('GMT')->toAtomString();
                $posts .= "
                <url>
                    <loc>$siteUrl/posts/$slug" . (!empty($post->index) ? '_indid_' . $post->index : '') . "</loc>
                    <lastmod>$updatedTime</lastmod>
                    <changefreq>monthly</changefreq>
                    <priority>0.5</priority>
                </url>
                ";
            }
            return [$tags, $posts];
        });
        $tags = $result[0];
        $posts = $result[1];
        $content = view('RSS.siteMap', compact('tags', 'posts'));
        return response($content)->header('Content-Type', 'text/xml');
    }
}

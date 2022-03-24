<?php

namespace App\Http\Controllers;

use App\Models\Post;

class RSSController extends Controller
{
    public function yandex()
    {
        $posts = cache()->remember('YandexRSS', 1000, function () {
            return Post::latest()->with('tags')->limit(700)->get();
        });
        $content = view('RSS.yandexRSS', compact('posts'));
        return response($content)->header('Content-Type', 'text/xml');
    }

//    public function rambler()
//    {
//        $posts = cache()->remember('RamblerRSS2', 1000, function () {
//            return Post::latest()->with('tags')->limit(700)->get();
//        });
//        $content = view('RSS.ramblerRSS', compact('posts'));
//        return response($content)->header('Content-Type', 'text/xml');
//    }
}

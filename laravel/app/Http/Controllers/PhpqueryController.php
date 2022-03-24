<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Services\Classes\TranslateSdk\Translator;
use App\Services\Traits\CreatePostWithTag;
use App\Services\Traits\ParseArticles;
use App\Services\Traits\Translitter;

class PhpqueryController extends Controller
{
    use ParseArticles, CreatePostWithTag, Translitter;

    public function index()
    {

        $this->getLinksFromPage('https://finviz.com/news.ashx', 30, 0);
        $articles = $this->parseArticles(0);
        $translator = new Translator;
        $result = $translator->translateString($articles);

        if (empty ($result['translations'][0]['text'])) exit('пустой результат');
        $translatedArticlesArray = $this->arrayFromResultString($result['translations'][0]['text']);
        $lastId = Post::latest()->first()->id;
        foreach ($translatedArticlesArray as $article) {
            $lastId++;
            $paragraphs = json_encode($article[0]);
            $title = $article[1][1];
            $description = $article[1][2];
            $h1 = $article[1][3];
            $postSlug = $this->translit($h1);
            $postData = [
                'title' => $title,
                'slug' => $postSlug,
                'body' => $paragraphs,
                'description' => $description,
                'h1' => $h1,
                'index'=> $lastId
            ];

            $tag = $article[1][0];
            $tagSlug = $this->translit($tag);
            $tagData = [
                'title' => $tag,
                'slug' => $tagSlug
            ];
            $this->createAndAttachPostWithTag($postData, $tagData);
        }
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Services\Classes\TranslateSdk\Translator;
use App\Services\Traits\CreatePostWithTag;
use App\Services\Traits\ParseArticles;
use App\Services\Traits\SendMessageToTmChannel;
use App\Services\Traits\Translitter;
use Illuminate\Console\Command;

class GetPosts extends Command
{
    use ParseArticles, CreatePostWithTag, Translitter, SendMessageToTmChannel;


    protected $signature = 'command:GetPosts';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
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

            //отправляем в Телеграм

            $message = $postData['h1'] . '.' . PHP_EOL .
                config('app.url') . '/posts/' . $postData['slug'] . PHP_EOL .
                '================' . PHP_EOL .
                'Раздел: ' . $tagData['title'] . PHP_EOL .
                config('app.url') . '/tags/' . $tagData['slug'];
            $this->sendToTelegram($message);
        }
        $message = 'Канал с инсайдерами: ' . 'https://t.me/invest_insider_ru' . PHP_EOL .
            '@finance_insider_bot - премиум бот анализа компаний, доступ ко всем инсайдерам по тикеру';
        $flag = random_int(0, 1);
        if ($flag) $this->sendToTelegram($message);
    }
}

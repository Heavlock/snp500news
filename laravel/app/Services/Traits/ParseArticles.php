<?php

namespace App\Services\Traits;

use App\Services\Classes\Parser;
use App\Services\Classes\Phpquery\PhpQueryCustom;
use Illuminate\Support\Facades\Cache;

trait ParseArticles
{
    public $links;
    public $articles = [];
    protected $parser;

    public function getPage($url, $useProxy = 0)
    {
        $this->parser = new Parser($url);
        $this->parser->fileGetContentsCurl($url, $useProxy);
        return $this->parser->result;
    }

    public function getLinksFromPage($url = 'https://finviz.com/news.ashx', $linksCount = 15, $useProxy = 0)
    {
        $page = PhpQueryCustom::newDocument($this->getPage($url, $useProxy));
        $page = PhpQueryCustom::newDocument($page);
        $links = $page['#news td a'];
        $resultArr = [];
        $maxLinkCount = $links->count();

        for ($i = 0; $i < $linksCount && $i < $maxLinkCount; $i++) {
            if (!$links->get($i)->hasAttribute('href')) continue;
            $link = $links->get($i)->getAttribute('href');
            if (!empty($parseLinkFromCache) && is_int(array_search($link, $parseLinkFromCache))) continue;
            if ($link == ($firstLinkFromCache ?? '')) break;
            if (is_int(strpos($link, 'www.reuters.com'))) $resultArr[] = $link;
        }

        $this->links[] = $resultArr[count($resultArr) - 1];
        if ($parseLinkFromCache = \cache('parseLinks')) $this->links = array_diff([$resultArr[count($resultArr) - 1]], $parseLinkFromCache);
        if (!empty($resultArr)) \cache()->put('parseLinks', $resultArr, 7200);
    }


    public function parseArticles($useProxy = 0)
    {
        if (empty($this->links)) exit('Нет ссылок');
        $articlesString = [];
        foreach ($this->links as $key => $link) {
            $page = PhpQueryCustom::newDocument($this->getPage($link, $useProxy));
            if (!$count = $page['.ArticleBodyWrapper p']->count()) continue;

            $this->articles[$key]['tag'] = $page['div.ArticleHeader-info-container-3-6YG a']->html();
            $this->articles[$key]['title'] = str_replace('Reuters', 'SNP500 news', $page['title']->html());
            $this->articles[$key]['description'] = $page['[name="description"]']->attr('content');
            $this->articles[$key]['h1'] = $page['h1']->html();
            for ($i = 2; $i < $count - 1; $i++) {
                $this->articles[$key]['p'][] = $page['.ArticleBodyWrapper p']->get($i)->textContent;
            }

            $articlesString[$key]['p'] = implode(PHP_EOL . '<|>' . PHP_EOL, $this->articles[$key]['p']);
            unset($this->articles[$key]['p']);
            $articlesString[$key]['data'] = implode(PHP_EOL . '<|>' . PHP_EOL, $this->articles[$key]);
            $articlesString[$key] = implode(PHP_EOL . '<!>' . PHP_EOL, $articlesString[$key]);
            sleep(3);
        }
        return implode(PHP_EOL . '<!!>' . PHP_EOL, $articlesString);
    }

    public function arrayFromResultString(string $result)
    {
        $resultArr = explode('<!!>', trim($result));
        foreach ($resultArr as $key => $articleString) {
            $articleArray = explode('<!>', trim($articleString));
            $resultArr[$key] = $articleArray;
            foreach ($articleArray as $key2 => $articleDataString) {
                $articleDataArray = explode('<|>', trim($articleDataString));
                $resultArr[$key][$key2] = $articleDataArray;
            }
        }
        return $resultArr;
    }
}

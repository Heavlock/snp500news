<?php

namespace App\Services\Classes;

class Parser
{
    public $url;
    public $result;
    public $proxyLogin = 'bEvnkX';
    public $proxyPassword = 'gXx3vZ8Fbv';
    public $proxy = '45.89.19.9:4324';

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    function fileGetContentsCurl($url, $proxy = 0)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        if ($proxy) {
            curl_setopt($ch, CURLOPT_PROXY, $this->proxy);
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$this->proxyLogin:$this->proxyPassword");
        }
        $data = curl_exec($ch);
        curl_close($ch);
        $this->result = $data;
    }

    public function setProxy(array $proxyData)
    {
        $this->proxyLogin = $proxyData['login'];
        $this->proxyPassword = $proxyData['password'];
        $this->proxy = $proxyData['proxy'];
    }
}

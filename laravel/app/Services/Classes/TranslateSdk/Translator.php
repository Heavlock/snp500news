<?php

namespace App\Services\Classes\TranslateSdk;

use App\Services\Classes\TranslateSdk\Exception\ClientException;

class Translator
{
    public $result;
    public $errors = [];
    public $apiKey;
    protected $cloud;
    protected $translate;


    public function __construct($apiKey = 'AQVNy4oZdydaAXgscIN2t0iD6jfz1cgc7SgNVzaI')
    {
        $this->apiKey = $apiKey;
        try {
            $this->cloud = Cloud::createApi($this->apiKey);
        } catch (ClientException $e) {
            $this->errors[] = $e->getMessage();
        }
    }

    public function translateString($string, $languageToTranslate = 'ru')
    {
        try {
            $this->translate = new Translate($string, $languageToTranslate);
        } catch (ClientException $e) {
            $this->errors[] = $e->getMessage();
        }
        return $this->sendRequest();
    }

    protected function sendRequest()
    {
        try {
            return $this->result = json_decode($this->cloud->request($this->translate), 1);
        } catch (ClientException $e) {
            $this->errors[] = $e->getMessage();
        }
    }
}

<?php

namespace App\Services\Classes;
class TelegramBot
{
    public $data = [];
    public $message = '123';
    public $sendData = [];
    public $userTelegramId;
    public $chatId;
    public $userIdOnSite;
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }


    public function setMessage($message)
    {
        $this->sendData['text'] = $message;
    }

    public function setChatId($chatId)
    {
        $this->sendData['chat_id'] = $chatId;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getUserTelegramId()
    {
        if (!empty($this->data['from']['id'])) {
            file_put_contents('botMessages.txt', 'UserTelegramId ' . $this->data['from']['id'] . PHP_EOL, FILE_APPEND);
            return $this->data['from']['id'];
        }
        return false;
    }


    public function sendToTelegram($method = 'sendMessage', $headers = [])
    {
        if (!empty($this->data['chat']['id'])) {
            $this->sendData['chat_id'] = $this->data['chat']['id'];
        } elseif (empty($this->sendData['chat_id'])) {
            exit('не установлен чат id');
        }
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.telegram.org/bot' . $this->token . '/' . $method,
            CURLOPT_POSTFIELDS => json_encode($this->sendData),
            CURLOPT_HTTPHEADER => array_merge(array("content-type: application/json"), $headers)
        ]);
        $result = curl_exec($curl);
        curl_close($curl);
        return (json_decode($result, true) ? json_decode($result, true) : $result);
    }

    public function test($message)
    {
        return $message;
    }

}

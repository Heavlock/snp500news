<?php

namespace App\Services\Traits;

use App\Services\Classes\TelegramBot;

trait SendMessageToTmChannel
{
    protected $tmBot;

    public function sendToTelegram($message)
    {
        $this->createBot();
        $this->tmBot->setChatId(config('myConfig.snp500ChannelData.channel_post.chat.id'));
        $this->tmBot->setMessage($message);
        $this->tmBot->sendToTelegram();
    }

    public function createBot()
    {
        $this->tmBot = new TelegramBot(config('myConfig.telegramToken'));
    }
}

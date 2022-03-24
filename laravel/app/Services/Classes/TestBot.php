<?php

namespace App\Services\Classes;

use App\Services\Traits\SendMessageToTmChannel;

class TestBot
{
    use SendMessageToTmChannel;

    public function __construct($message)
    {
        $this->sendToTelegram($message);
    }
}

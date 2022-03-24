<?php

/**
 * Файл из репозитория Yandex-Translate-SDK
 * @link https://github.com/itpanda-llc/yandex-translate-sdk
 */

namespace App\Services\Classes\TranslateSdk;

/**
 * Class Text
 * @package App\Services\Classes\TranslateSdk
 * Сообщения исключений
 */
class Message
{
    /**
     * Ошибка длины параметра(ов)
     */
    public const LENGTH_ERROR = 'Превышена длина параметра(ов)';

    /**
     * Ошибка количества параметра(ов)
     */
    public const COUNT_ERROR = 'Превышено количество параметра(ов)';
}

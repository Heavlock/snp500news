<?php

/**
 * Файл из репозитория Yandex-Translate-SDK
 * @link https://github.com/itpanda-llc/yandex-translate-sdk
 */

namespace App\Services\Classes\TranslateSdk;

/**
 * Class Format
 * @package App\Services\Classes\TranslateSdk
 * Формат текста
 */
class Format
{
    /**
     * Текст без разметки (По умолчанию)
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    public const PLAIN_TEXT = 'PLAIN_TEXT';

    /**
     * Текст в формате HTML
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    public const HTML = 'HTML';
}

<?php

namespace App\Services\Traits;
trait Translitter
{
    public function translit($slug)
    {
        $slug = (string)$slug; // преобразуем в строковое значение
        $slug = strip_tags($slug); // убираем HTML-теги
        $slug = str_replace(array("\n", "\r"), " ", $slug); // убираем перевод каретки
        $slug = preg_replace("/\s+/", ' ', $slug); // удаляем повторяющие пробелы
        $slug = trim($slug); // убираем пробелы в начале и конце строки
        $slug = function_exists('mb_strtolower') ? mb_strtolower($slug) : strtolower($slug); // переводим строку в нижний регистр (иногда надо задать локаль)
        $slug = strtr($slug, array('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'ъ' => '', 'ь' => ''));
        $slug = preg_replace("/[^0-9a-z-_ ]/i", "", $slug); // очищаем строку от недопустимых символов
        $slug = str_replace(" ", "_", $slug); // заменяем пробелы знаком нижнее подчеркивание
        return $slug; // возвращаем результат
    }
}

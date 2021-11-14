<?php

namespace App\Components\Helpers;

class StringHelper
{

    public static function getShortText(string $text, int $length = 350): string
    {
        return (mb_strlen($text, 'UTF-8') > $length ? mb_substr($text, 0, $length - 3, 'UTF-8') . '...' : $text);
    }

}

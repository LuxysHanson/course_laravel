<?php

namespace App\Components\Enums;

use App\Components\Parsers\LentaRuParser;
use App\Components\Parsers\WplaysParser;
use BenSampo\Enum\Enum;

final class NewsParserEnum extends Enum
{
    const PARSER_LENTA = 0;
    const PARSER_YANDEX = 1;
    const PARSER_WPLAYS = 2;

    public static function labels(): array
    {
        return [
            self::PARSER_LENTA => __('Источник lenta.ru'),
            self::PARSER_YANDEX => __('Источник news.yandex.ru'),
            self::PARSER_WPLAYS => __('Источник wplays.ru'),
        ];
    }

    public static function getClassByParse(int $type): string
    {
        $parsers = [
            self::PARSER_LENTA => LentaRuParser::class,
            self::PARSER_WPLAYS => WplaysParser::class
        ];
        return $parsers[$type] ?? '';
    }

}

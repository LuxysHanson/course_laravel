<?php

namespace App\Components\Enums;

use App\Components\Parsers\LentaRuParser;
use BenSampo\Enum\Enum;

final class NewsParserEnum extends Enum
{
    const PARSER_LENTA = 0;
    const PARSER_YANDEX = 1;
    const PARSER_CBR = 2;

    public static function labels(): array
    {
        return [
            self::PARSER_LENTA => __('Источник lenta.ru'),
            self::PARSER_YANDEX => __('Источник news.yandex.ru'),
            self::PARSER_CBR => __('Источник www.cbr-xml-daily.ru'),
        ];
    }

    public static function getClassByParse(int $type): string
    {
        $parsers = [
            self::PARSER_LENTA => LentaRuParser::class
        ];
        return $parsers[$type] ?? '';
    }

}

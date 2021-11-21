<?php

namespace App\Components\Enums\News;

use BenSampo\Enum\Enum;

final class NewsStatusEnum extends Enum
{
    const STATUS_PUBLISHED = 0;
    const STATUS_HIDDEN = 1;

    public static function labels(): array
    {
        return [
            self::STATUS_PUBLISHED => __('Опубликованные'),
            self::STATUS_HIDDEN => __('Скрытые')
        ];
    }

}

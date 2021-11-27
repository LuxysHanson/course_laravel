<?php

namespace App\Components\Enums\News;

use BenSampo\Enum\Enum;

final class ExportTypeEnum extends Enum
{
    const TYPE_JSON =  0;
    const TYPE_EXCEL =   1;

    public static function labels(): array
    {
        return [
            self::TYPE_JSON => __('в JSON формате'),
            self::TYPE_EXCEL => __('в EXCEL формате')
        ];
    }

}

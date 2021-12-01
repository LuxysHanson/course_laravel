<?php

namespace App\Components\Enums;

use BenSampo\Enum\Enum;

final class SocialTypeEnum extends Enum
{
    const TYPE_VK = 1;
    const TYPE_GITHUB = 2;

    public static function labels()
    {
        return [
            self::TYPE_VK => 'vkontakte',
            self::TYPE_GITHUB => 'github'
        ];
    }

}

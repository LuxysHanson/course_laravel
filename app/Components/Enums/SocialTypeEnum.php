<?php

namespace App\Components\Enums;

use BenSampo\Enum\Enum;

final class SocialTypeEnum extends Enum
{
    const DRIVER_VK = 'vk';
    const DRIVER_GITHUB = 'github';

    public static function labels()
    {
        return [
            self::DRIVER_VK => 'vkontakte',
            self::DRIVER_GITHUB => 'github'
        ];
    }

}

<?php

namespace App\Components\Enums;

use BenSampo\Enum\Enum;

final class UsersRoleEnum  extends Enum
{
    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';
    const ROLE_SUPER = 'root_admin';

    public static function labels()
    {
        return [
            self::ROLE_USER => __('Пользователь'),
            self::ROLE_ADMIN => __('Администратор')
        ];
    }

}

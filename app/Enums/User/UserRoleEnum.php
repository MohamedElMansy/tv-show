<?php

namespace App\Enums\User;


enum UserRoleEnum: int
{
    case USER = 1;

    case ADMIN = 2;

    public static function asArray(): array
    {
        return [
            self::USER->value => 'User',
            self::ADMIN->value => 'Admin',
        ];
    }
}

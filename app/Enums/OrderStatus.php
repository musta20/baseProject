<?php

namespace App\Enums;

enum OrderStatus: int
{
    case NEW_ORDER = 0;
    case ORDER_RECEIVED = 1;
    case COMPLETED_ORDER = 2;
    case DELIVERED_ORDER = 3;
    case CANCLED_ORDER = 4;

    public static function getname(int $status)
    {
        $name = self::tryFrom($status);
        if ($name) {
            return $name->name;
        }
    }
}

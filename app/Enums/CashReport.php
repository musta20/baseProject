<?php

namespace App\Enums;

enum CashReport: int
{
    case FULLY_PAID = 0;
    case PARTILY_PAYED = 1;
    case NOT_PAYED = 2;

    public static function getname(int $status)
    {
        $name = self::tryFrom($status);
        if ($name) {
            return $name->name;
        }
    }
}

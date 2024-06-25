<?php

namespace App\Enums;

enum BillType: int
{
    case CUSTOMMER_BILL = 0;
    case INNVER_BILL = 1;

    public static function getname(int $status)
    {
        $name = self::tryFrom($status);
        if ($name) {
            return $name->name;
        }
    }
}

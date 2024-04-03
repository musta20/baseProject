<?php

namespace App\Enums;



enum ReportType: string
{
    case CASH = 'CASH';
    case ORDER = 'ORDER';
    case BILL = 'BILL';

    public static function getRandom(): self
    {
        $cases = self::cases();
        $randomIndex = rand(0, count($cases) - 1);
        return $cases[$randomIndex];
    }

}


?>
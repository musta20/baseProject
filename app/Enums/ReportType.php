<?php

namespace App\Enums;



enum ReportType: string
{
    case CASH = 'CASH';
    case ORDER = 'ORDER';
    case BILL = 'BILL';
}


?>
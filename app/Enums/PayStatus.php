<?php

namespace App\Enums;



enum PayStatus: int
{
    case FULLY_PAID  = 0;
    case PARTILY_PAYED  = 1;
    case NOT_PAYED  = 3;

}


?>
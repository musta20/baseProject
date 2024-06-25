<?php

namespace App\Enums;

enum ReportStatus: int
{
    case WAITING = 0;
    case IN_PROGRESS = 1;
    case READY = 2;
    case DELIVERED = 3;
    case CANCELLED = 4;
    case EXPIRED = 6;
    case CLOSED = 5;
}

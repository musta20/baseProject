<?php

namespace App\Enums;

enum TaskStatus: int
{
    case NOT_ASSINED = 0;
    case START_WORKING = 1;
    case PARTILY_DONE = 2;
    case DONE = 3;

    public static function getName($value)
    {
        foreach (self::cases() as $case) {
            if ($case->name === $value) {
                break;
            }
        }

        return $case->name;
    }
}

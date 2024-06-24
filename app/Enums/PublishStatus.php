<?php

namespace App\Enums;

enum PublishStatus: string
{
    case PUBLISHED = 'PUBLISHED';
    case DRAFT = 'DRAFT';
    case CREATED = 'CREATED';

    public static function getRandomStatus(): self
    {
        $cases = self::cases();
        $randomIndex = rand(0, count($cases) - 1);

        return $cases[$randomIndex];
    }
}

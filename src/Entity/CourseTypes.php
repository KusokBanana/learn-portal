<?php

namespace App\Entity;

use Assert\Assert;

class CourseTypes
{


    public const TYPES = [];

    public static function validateType(string $type): void
    {
        Assert::that($type)->inArray(
            self::TYPES,
            sprintf('Invalid course type "%s".', $type)
        );
    }
}

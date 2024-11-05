<?php

namespace App\Enums;

use ReflectionClass;

abstract class Enum
{
    final public static function getAll(): array
    {
        return array_values(static::toArray());
    }

    final public static function toArray(): array
    {
        return (new ReflectionClass(static::class))->getConstants();
    }
}

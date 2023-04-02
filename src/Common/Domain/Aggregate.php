<?php

declare(strict_types=1);

namespace App\Common\Domain;

use Ramsey\Uuid\Uuid;

abstract class Aggregate
{
    public static function uuid(): string
    {
        return Uuid::uuid4()->toString();
    }
}

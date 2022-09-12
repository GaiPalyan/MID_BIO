<?php

declare(strict_types=1);

namespace App\Services\Number;

class NumberCreator
{
    /**
     * Generate random number
     *
     * @return int
     * @throws \Exception
     */
    public static function generate(): int
    {
        return random_int(0, 10000);
    }
}

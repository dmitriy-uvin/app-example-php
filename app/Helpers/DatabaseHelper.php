<?php

declare(strict_types=1);

namespace App\Helpers;

final class DatabaseHelper
{
    public static function offset(int $page, int $perPage): int
    {
        return $page === 1 ? 0 : $perPage * $page;
    }
}

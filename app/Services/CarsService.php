<?php

declare(strict_types=1);

namespace App\Services;

use App\Repository\Contracts\CarsRepositoryInterface;

final class CarsService
{
    public function __construct(
        private readonly CarsRepositoryInterface $carsRepository
    ) {
    }
}

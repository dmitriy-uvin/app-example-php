<?php

namespace App\Repository\Contracts;

use App\Models\Car;

interface CarsRepositoryInterface
{
    public function getByIdFull(int $id): ?Car;
    public function getById(int $id): ?Car;
}

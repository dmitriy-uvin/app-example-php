<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Car;
use App\Repository\Contracts\CarsRepositoryInterface;

final class CarsRepository implements CarsRepositoryInterface
{
    public function getById(int $id): ?Car
    {
        return Car::find($id);
    }

    public function getByIdFull(int $id): ?Car
    {
        return Car::with('owner')
            ->where('id', '=', $id)
            ->get()
            ->first();
    }
}

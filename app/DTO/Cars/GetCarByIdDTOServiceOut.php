<?php

declare(strict_types=1);

namespace App\DTO\Cars;

use App\Models\Car;

final class GetCarByIdDTOServiceOut
{
    public function __construct(
        private readonly Car $car
    ) {
    }

    /**
     * @return Car
     */
    public function getCar(): Car
    {
        return $this->car;
    }
}

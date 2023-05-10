<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\Cars\GetCarByIdDTOServiceIn;
use App\DTO\Cars\GetCarByIdDTOServiceOut;
use App\Exceptions\Http\CarNotFoundHttpError;
use App\Repository\Contracts\CarsRepositoryInterface;

final class CarsService
{
    public function __construct(
        private readonly CarsRepositoryInterface $carsRepository
    ) {
    }

    /**
     * @throws CarNotFoundHttpError
     */
    public function getByIdFull(GetCarByIdDTOServiceIn $dto): GetCarByIdDTOServiceOut
    {
        $car = $this->carsRepository->getByIdFull($dto->getId());
        if (!$car) {
            throw new CarNotFoundHttpError();
        }
        return new GetCarByIdDTOServiceOut($car);
    }

    /**
     * @throws CarNotFoundHttpError
     */
    public function getById(GetCarByIdDTOServiceIn $dto): GetCarByIdDTOServiceOut
    {
        $car = $this->carsRepository->getById($dto->getId());
        if (!$car) {
            throw new CarNotFoundHttpError();
        }
        return new GetCarByIdDTOServiceOut($car);
    }
}

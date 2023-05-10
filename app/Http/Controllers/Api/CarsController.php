<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\DTO\Cars\GetCarByIdDTOServiceIn;
use App\Exceptions\Http\CarNotFoundHttpError;
use App\Services\CarsService;
use Illuminate\Http\JsonResponse;

final class CarsController extends BaseApiController
{
    public function __construct(
        private readonly CarsService $carsService
    ) {
    }

    /**
     * @throws CarNotFoundHttpError
     */
    public function getById(int $id): JsonResponse
    {
        $response = $this->carsService->getById(
            new GetCarByIdDTOServiceIn($id)
        );

        return $this->respondSuccess($response->getCar()->toArray());
    }

    /**
     * @throws CarNotFoundHttpError
     */
    public function getByIdFull(int $id): JsonResponse
    {
        $response = $this->carsService->getByIdFull(
            new GetCarByIdDTOServiceIn($id)
        );

        return $this->respondSuccess($response->getCar()->toArray());
    }
}

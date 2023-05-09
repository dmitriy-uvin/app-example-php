<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Services\CarsService;

final class CarsController extends BaseApiController
{
    public function __construct(
        private readonly CarsService $carsService
    ) {
    }

    public function create()
    {

    }

    public function delete(int $id)
    {

    }
}

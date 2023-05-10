<?php

declare(strict_types=1);

namespace App\Exceptions\Http;

use Symfony\Component\HttpFoundation\Response;

final class CarNotFoundHttpError extends BaseHttpError
{
    protected $message = 'Car not found!';
    protected int $statusCode = Response::HTTP_NOT_FOUND;
}

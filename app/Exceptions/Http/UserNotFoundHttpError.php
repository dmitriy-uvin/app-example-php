<?php

declare(strict_types=1);

namespace App\Exceptions\Http;

use Symfony\Component\HttpFoundation\Response;

final class UserNotFoundHttpError extends BaseHttpError
{
    protected $message = 'User not found!';
    protected int $statusCode = Response::HTTP_NOT_FOUND;
}

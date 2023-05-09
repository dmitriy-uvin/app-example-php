<?php

declare(strict_types=1);

namespace App\Exceptions\Http;

use Symfony\Component\HttpFoundation\Response;

final class UserAlreadyExistsHttpError extends BaseHttpError
{
    protected $message = 'User already exists!';
    protected int $statusCode = Response::HTTP_BAD_REQUEST;
}

<?php

declare(strict_types=1);

namespace App\Exceptions\Http;

use Symfony\Component\HttpFoundation\Response;

final class PasswordsMismatchHttpError extends BaseHttpError
{
    protected $message = "Passwords don't match!";
    protected int $statusCode = Response::HTTP_BAD_REQUEST;
}

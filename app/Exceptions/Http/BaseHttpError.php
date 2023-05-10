<?php

declare(strict_types=1);

namespace App\Exceptions\Http;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

abstract class BaseHttpError extends Exception
{
    protected $message = 'Something went wrong!';
    protected int $statusCode;

    public function __construct(
        string $message = "",
        int $statusCode = Response::HTTP_BAD_REQUEST,
        ?Throwable $previous = null,
        int $code = 0
    ) {
        $this->statusCode = $this->statusCode ?: $statusCode;
        parent::__construct($message ?: $this->message, $code, $previous);
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}

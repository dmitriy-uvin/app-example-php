<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseApiController extends Controller
{
    public function respondSuccess(array $data, int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'data' => $data
        ], $code);
    }
}

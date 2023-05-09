<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\DTO\User\CreateUserDTOServiceIn;
use App\DTO\User\DeleteUserByIdDTOServiceIn;
use App\DTO\User\UserByIdDTOServiceIn;
use App\DTO\User\UsersListDTOServiceIn;
use App\Exceptions\Http\PasswordsMismatchHttpError;
use App\Exceptions\Http\UserAlreadyExistsHttpError;
use App\Exceptions\Http\UserNotFoundHttpError;
use App\Http\Requests\CreateUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class UsersController extends BaseApiController
{
    public function __construct(
        private readonly UserService $userService
    ) {
    }

    public function listAll(Request $request): JsonResponse
    {
        $page = $request->page ? (int)$request->page : null;
        $perPage = $request->per_page ? (int)$request->per_page : null;

        $response = $this->userService->fetchList(
            new UsersListDTOServiceIn($page, $perPage)
        );

        return $this->respondSuccess($response->getUsers()->toArray());
    }

    /**
     * @throws UserNotFoundHttpError
     */
    public function findById(int $id): JsonResponse
    {
        $response = $this->userService->getById(
            new UserByIdDTOServiceIn($id)
        );

        return $this->respondSuccess($response->getUser()->toArray());
    }

    /**
     * @throws UserAlreadyExistsHttpError
     * @throws PasswordsMismatchHttpError
     */
    public function create(CreateUserRequest $request): JsonResponse
    {
        $response = $this->userService->createUser(
            new CreateUserDTOServiceIn(
                $request->name,
                $request->email,
                $request->password,
                $request->password_confirmation,
            )
        );

        return $this->respondSuccess(
            $response->getUser()->toArray(),
            Response::HTTP_CREATED
        );
    }

    /**
     * @throws UserNotFoundHttpError
     */
    public function delete(int $id): JsonResponse
    {
        $this->userService->deleteById(
            new DeleteUserByIdDTOServiceIn($id)
        );

        return $this->respondSuccess([], Response::HTTP_NO_CONTENT);
    }
}

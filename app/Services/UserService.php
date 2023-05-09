<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\User\CreateUserDTORepoIn;
use App\DTO\User\CreateUserDTOServiceIn;
use App\DTO\User\CreateUserDTOServiceOut;
use App\DTO\User\DeleteUserByIdDTOServiceIn;
use App\DTO\User\UserByIdDTOServiceIn;
use App\DTO\User\UserByIdDTOServiceOut;
use App\DTO\User\UsersListDTOServiceIn;
use App\DTO\User\UsersListDTOServiceOut;
use App\Exceptions\Http\PasswordsMismatchHttpError;
use App\Exceptions\Http\UserAlreadyExistsHttpError;
use App\Exceptions\Http\UserNotFoundHttpError;
use App\Repository\Contracts\UsersRepositoryInterface;
use Illuminate\Support\Facades\Hash;

final class UserService
{
    public function __construct(
        private readonly UsersRepositoryInterface $usersRepository
    ) {
    }

    public function fetchList(UsersListDTOServiceIn $dto): UsersListDTOServiceOut
    {
        $users = $this->usersRepository->getAllPaginated($dto->getPage(), $dto->getPerPage());
        return new UsersListDTOServiceOut($users);
    }

    /**
     * @throws UserNotFoundHttpError
     */
    public function getById(UserByIdDTOServiceIn $dto): UserByIdDTOServiceOut
    {
        $user = $this->usersRepository->getById($dto->getId());
        if (!$user) {
            throw new UserNotFoundHttpError();
        }
        return new UserByIdDTOServiceOut($user);
    }

    public function createUser(CreateUserDTOServiceIn $dto): CreateUserDTOServiceOut
    {
        $user = $this->usersRepository->getByEmail($dto->getEmail());
        if ($user) {
            throw new UserAlreadyExistsHttpError();
        }

        if ($dto->getPassword() !== $dto->getPasswordConfirmation()) {
            throw new PasswordsMismatchHttpError();
        }
        $createdUser = $this->usersRepository->create(
            new CreateUserDTORepoIn(
                $dto->getName(),
                $dto->getEmail(),
                Hash::make($dto->getPassword())
            )
        );

        return new CreateUserDTOServiceOut($createdUser);
    }

    public function deleteById(DeleteUserByIdDTOServiceIn $dto): void
    {
        $user = $this->usersRepository->getById($dto->getId());
        if (!$user) {
            throw new UserNotFoundHttpError();
        }
        $this->usersRepository->deleteById($dto->getId());
    }
}

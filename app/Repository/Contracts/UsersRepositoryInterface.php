<?php

namespace App\Repository\Contracts;

use App\DTO\User\CreateUserDTORepoIn;
use App\DTO\User\UsersListDTORepoIn;
use App\Models\User;
use Illuminate\Support\Collection;

interface UsersRepositoryInterface
{
    public function getById(int $id): ?User;
    public function getByIdFull(int $id): ?User;
    public function getByEmail(string $email): ?User;
    public function getAllPaginated(UsersListDTORepoIn $dto): Collection;
    public function create(CreateUserDTORepoIn $dto): User;
    public function deleteById(int $id): void;
}

<?php

namespace App\Repository\Contracts;

use App\DTO\User\CreateUserDTORepoIn;
use App\Models\User;
use Illuminate\Support\Collection;

interface UsersRepositoryInterface
{
    public function getById(int $id): ?User;
    public function getByEmail(string $email): ?User;
    public function getAllPaginated(?int $page, ?int $perPage): Collection;
    public function create(CreateUserDTORepoIn $dto): User;
}

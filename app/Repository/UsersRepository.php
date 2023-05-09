<?php

declare(strict_types=1);

namespace App\Repository;

use App\DTO\User\CreateUserDTORepoIn;
use App\Helpers\DatabaseHelper;
use App\Models\User;
use App\Repository\Contracts\UsersRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

final class UsersRepository implements UsersRepositoryInterface
{
    private const DEFAULT_PER_PAGE = 20;

    public function getById(int $id): ?User
    {
        return User::findById($id);
    }

    public function getByEmail(string $email): ?User
    {
        return User::where('email', '=', $email)->first();
    }

    public function getAllPaginated(?int $page = 1, ?int $perPage = self::DEFAULT_PER_PAGE): Collection
    {
        $offset = DatabaseHelper::offset($page, $perPage);
        return User::query()->limit($perPage)->offset($offset)->get();
    }

    public function create(CreateUserDTORepoIn $dto): User
    {
        $user = new User();
        $user->name = $dto->getName();
        $user->email = $dto->getEmail();
        $user->password = $dto->getPassword();
        $user->save();
        return $user;
    }
}

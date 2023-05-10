<?php

declare(strict_types=1);

namespace App\Repository;

use App\DTO\User\CreateUserDTORepoIn;
use App\DTO\User\UsersListDTORepoIn;
use App\Helpers\DatabaseHelper;
use App\Models\User;
use App\Repository\Contracts\UsersRepositoryInterface;
use Illuminate\Support\Collection;

final class UsersRepository implements UsersRepositoryInterface
{
    private const DEFAULT_PER_PAGE = 20;

    public function getById(int $id): ?User
    {
        return User::find($id);
    }

    public function getByIdFull(int $id): ?User
    {
        return User::with('cars')
            ->where('id', '=', $id)
            ->get()->first();
    }

    public function getByEmail(string $email): ?User
    {
        return User::where('email', '=', $email)->first();
    }

    public function getAllPaginated(UsersListDTORepoIn $dto): Collection
    {
        $page = $dto->getPage() ?: 1;
        $perPage = $dto->getPerPage() ?: self::DEFAULT_PER_PAGE;
        $offset = DatabaseHelper::offset($page, $perPage);
        $query = User::query();
        if ($dto->isWithCars()) {
            $query->with('cars');
        }
        $query->limit($perPage)->offset($offset);
        return $query->get();
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

    public function deleteById(int $id): void
    {
        $user = User::find($id);
        $user->delete();
    }
}

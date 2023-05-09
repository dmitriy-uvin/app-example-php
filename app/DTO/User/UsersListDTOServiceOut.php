<?php

declare(strict_types=1);

namespace App\DTO\User;

use Illuminate\Support\Collection;

final class UsersListDTOServiceOut
{
    public function __construct(
        private readonly Collection $users
    ) {
    }

    /**
     * @return Collection
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }
}

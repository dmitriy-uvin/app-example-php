<?php

declare(strict_types=1);

namespace App\DTO\User;

use App\Models\User;

final class UserByIdDTOServiceOut
{
    public function __construct(
        private readonly User $user
    ) {
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}

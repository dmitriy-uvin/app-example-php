<?php

declare(strict_types=1);

namespace App\DTO\User;

final class CreateUserDTORepoIn
{
    public function __construct(
      private readonly string $name,
      private readonly string $email,
      private readonly string $password,
    ) {
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}

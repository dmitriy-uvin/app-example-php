<?php

declare(strict_types=1);

namespace App\DTO\User;

final class UsersListDTORepoIn
{
    public function __construct(
       private readonly ?int $page,
       private readonly ?int $perPage,
       private readonly bool $withCars,
    ) {
    }

    /**
     * @return ?int
     */
    public function getPerPage(): ?int
    {
        return $this->perPage;
    }

    /**
     * @return ?int
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * @return bool
     */
    public function isWithCars(): bool
    {
        return $this->withCars;
    }
}

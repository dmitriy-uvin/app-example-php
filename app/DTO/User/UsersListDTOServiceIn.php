<?php

declare(strict_types=1);

namespace App\DTO\User;

final class UsersListDTOServiceIn
{
    public function __construct(
        private readonly ?int $page,
        private readonly ?int $perPage,
        private readonly bool $withCars = false
    ) {
    }

    /**
     * @return bool
     */
    public function isWithCars(): bool
    {
        return $this->withCars;
    }

    /**
     * @return int|null
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * @return int|null
     */
    public function getPerPage(): ?int
    {
        return $this->perPage;
    }
}

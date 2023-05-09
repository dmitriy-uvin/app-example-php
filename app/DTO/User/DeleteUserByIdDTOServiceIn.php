<?php

declare(strict_types=1);

namespace App\DTO\User;

final class DeleteUserByIdDTOServiceIn
{
    public function __construct(
        private readonly ?int $id
    ) {
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}

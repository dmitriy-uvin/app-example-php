<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repository\Contracts\UsersRepositoryInterface;
use App\Repository\UsersRepository;
use Illuminate\Support\ServiceProvider;

final class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UsersRepositoryInterface::class, UsersRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

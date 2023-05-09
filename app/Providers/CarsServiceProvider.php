<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repository\CarsRepository;
use App\Repository\Contracts\CarsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

final class CarsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CarsRepositoryInterface::class, CarsRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

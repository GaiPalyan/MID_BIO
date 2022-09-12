<?php

declare(strict_types=1);

namespace App\Providers;

use App\Domain\Number\NumberRepositoryInterface;
use App\Repositories\Number\NumberRepository;
use Illuminate\Support\ServiceProvider;

class NumberRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(NumberRepositoryInterface::class, NumberRepository::class);
    }
}

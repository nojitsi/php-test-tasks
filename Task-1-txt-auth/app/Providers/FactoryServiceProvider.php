<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Factories\UserFactoryInterface;
use App\Factories\UserFactory;

class FactoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserFactoryInterface::class, UserFactory::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

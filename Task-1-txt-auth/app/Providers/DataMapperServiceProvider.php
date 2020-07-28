<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\DataMappers\UserDataMapperInterface;
use App\DataMappers\UserDataMapper;

class DataMapperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserDataMapperInterface::class, UserDataMapper::class);
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

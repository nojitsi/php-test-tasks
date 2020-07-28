<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Parser\UserDataFileParserInterface;
use App\Parser\UserDataPhpFileArrayParser;

class ParserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserDataFileParserInterface::class, UserDataPhpFileArrayParser::class);
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

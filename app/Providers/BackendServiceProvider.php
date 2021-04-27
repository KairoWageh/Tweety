<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\contracts\BaseRepositoryInterface',
            'App\Repository\sql\BaseRepository'
        );

        $this->app->bind(
            'App\Repository\contracts\TweetsRepositoryInterface',
            'App\Repository\sql\TweetsRepository'
        );
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

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Dao Registeration
        $this->app->bind('App\Contracts\Dao\PostDaoInterface','App\Dao\PostDao');

        //Business Logic Registeration
        $this->app->bind('App\Contracts\Services\PostServiceInterface','App\Services\PostService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

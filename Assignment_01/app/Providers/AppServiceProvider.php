<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        $this->app->bind('App\Contracts\Dao\Category\CategoryDaoInterface','App\Dao\Category\CategoryDao');
        $this->app->bind('App\Contracts\Dao\Product\ProductDaoInterface','App\Dao\Product\ProductDao');

        //Business Logic Registeration
        $this->app->bind('App\Contracts\Services\Product\ProductServiceInterface','App\Services\Product\ProductService');
        $this->app->bind('App\Contracts\Services\Category\CategoryServiceInterface','App\Services\Category\CategoryService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}

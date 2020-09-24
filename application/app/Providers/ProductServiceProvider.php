<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->ProductComposer();

    }

    public function ProductComposer()
    {
        view()->composer('*','App\Http\ViewComposers\ProductComposer');
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// add this in windows for migrate error
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // add this in windows for migrate error
        Schema::defaultStringLength(191);
    }
}

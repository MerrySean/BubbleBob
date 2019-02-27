<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        date_default_timezone_set('Asia/Manila');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $file = app_path('helper/helper.php');
        if (file_exists($file)) {
            require_once($file);
        }
    }
}

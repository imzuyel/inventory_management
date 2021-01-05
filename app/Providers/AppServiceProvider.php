<?php

namespace App\Providers;

use App\Models\Setting;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('inventory.include.left_sidebar', function ($view) {
            $setting = Setting::first();
            $view->with([
                'setting' => $setting,
            ]);
        });
        view()->composer('inventory.include.top_bar', function ($view) {
            $setting = Setting::first();
            $view->with([
                'setting' => $setting,
            ]);
        });
    }
}

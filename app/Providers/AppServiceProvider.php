<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        view()->composer('layout.sidebar', function($view) {
            $view->with('tagsCloud', \App\Models\Tag::all());
        });

        Blade::if('admin', function ($user) {
            return isset($user) && $user->isAdmin();
        });

        Blade::if('user', function ($user) {
            return isset($user) && ! $user->isAdmin();
        });
    }
}

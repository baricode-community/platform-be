<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app['events']->listen(Login::class, \App\Listeners\General\Security\LogUserLogin::class);
        $this->app['events']->listen(Logout::class, \App\Listeners\General\Security\LogUserLogout::class);

    }
}

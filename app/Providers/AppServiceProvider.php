<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * @var string
     */
    public const HOME = '/admin/dashboard';

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //
    }
}
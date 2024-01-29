<?php

namespace App\Providers;

use App\View\Components\DashboardLayout;
use App\View\Components\Navbar;
use Illuminate\Support\Facades\Blade;
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
        Blade::component('navbar', Navbar::class);
        Blade::component('dashboard-layout2', DashboardLayout::class);// looks like dashboard-layout is reserved
    }
}

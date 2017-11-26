<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        View::composer('*', 'App\Http\ViewComposers\AppComposer');
        View::composer('parts.footer_first', 'App\Http\ViewComposers\FooterComposer');
        View::composer('parts.sidebar', 'App\Http\ViewComposers\SidebarComposer');
             
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}

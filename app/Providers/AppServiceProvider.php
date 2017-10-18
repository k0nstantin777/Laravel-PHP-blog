<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use \App\Includes\Classes\CurrentData;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $isAuth = true;
        
        View::composer('*', function ($view) use ($isAuth) {
            if ($isAuth !== true){
                $user = 'guest'; 
            } else {
                $user = 'Admin';
                $ip = getip();
            }
            
            $view->with('user', $user);
            $view->with('ip', $ip);
        });
        
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Data', function () {
            return new CurrentData();
        });
        
        $this->app->singleton('FormatData', function () {
            return new CurrentData();
        });
    }
}

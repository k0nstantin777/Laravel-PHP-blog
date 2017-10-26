<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Includes\Classes\CurrentData;

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
        
        View::composer('*', function ($view) {
            $user = Auth::user();
            
            if (!Auth::check()){
                $currentUser = false ;
                $ip = '';
            } else {
                $currentUser = $user->name;
                $ip = getIp();
            }
            
            $view->with('currentUser', $currentUser);
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

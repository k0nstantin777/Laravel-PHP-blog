<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Includes\Classes\FormatData;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Post;

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
                $currentUser = $user;
                $ip = getIp();
            }
            
            $view->with('currentUser', $currentUser);
            $view->with('ip', $ip);
        });
        
        View::composer('widgets.footer.comments', function ($view) {
            $comments = Comment::orderBy('created_at', 'desc')->limit(5)->get();
            
            $view->with('comments', $comments);
        });
        
        View::composer('widgets.sidebar.categories', function ($view) {
            $categories = Category::orderBy('name', 'ASC')->get();
            
            $view->with('categories', $categories);
        });
        
        View::composer('widgets.sidebar.favorite_post', function ($view) {
            $post = Post::where('is_favorite', 1)
                        ->first();
            
            $view->with('post', $post);
        });
        
        View::composer('widgets.sidebar.popular_posts', function ($view) {
            $posts = Post::where('views_count', '>' , 3)
                        ->limit(5)
                        ->orderBy('views_count','desc')
                        ->get();
            
            $view->with('posts', $posts);
            $view->with('fdata', $this->app->make('App\Includes\Classes\FormatData'));
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

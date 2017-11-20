<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Models\Category;
use App\Models\Post;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    
    protected $adminNamespace = 'App\Http\Controllers\Admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::model('category', Category::class);
        Route::model('post', Post::class);

        parent::boot();
       
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
        $this->mapImageRoutes();
        $this->mapDownloadRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }
    
    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware('web')
             ->prefix('/admin')
             ->namespace($this->adminNamespace)
             ->group(base_path('routes/admin.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
    
    /**
     * Define the "images" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapImageRoutes()
    {
        Route::middleware('web')
            ->prefix('/image')
            ->namespace($this->namespace)
            ->group(base_path('routes/image.php'));
    }
    /**
     * Define the "download" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapDownloadRoutes()
    {
        Route::middleware('web')
            ->prefix('/file')
            ->namespace($this->namespace)
            ->group(base_path('routes/file.php'));
    }
}

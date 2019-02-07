<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

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

        //
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
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('v1')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));

             Route::model('about', \App\About::class);
             Route::model('about2', \App\About2::class);
             Route::model('client', \App\Client::class);
             Route::model('kelebihan', \App\Kelebihan::class);
             Route::model('newsletter', \App\Newsletter::class);
             Route::model('pelayanan', \App\Pelayanan::class);
             Route::model('portofolio', \App\Portofolio::class);
             Route::model('profile', \App\Profile::class);
             Route::model('slideshow', \App\Slideshow::class);
             Route::model('teknologi', \App\Teknologi::class);
    }
}

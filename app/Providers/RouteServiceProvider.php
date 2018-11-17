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

    protected $api_version;

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->api_version = config('default.api.version');

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiAdminRoutes();

        $this->mapApiFrontRoutes();

        // $this->mapWebRoutes();

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
     * Define the "api.admin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiAdminRoutes()
    {
        Route::prefix('api/' . $this->api_version . '/admin')
             ->middleware('api')
             ->namespace($this->namespace . '\Api\\' . strtoupper($this->api_version) . '\Admin')
             ->group(base_path('routes/api/admin.php'));
    }

    /**
     * Define the "api.front" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiFrontRoutes()
    {
        Route::prefix('api/' . $this->api_version)
             ->middleware('api')
             ->namespace($this->namespace . '\Api\\' . strtoupper($this->api_version) . '\Front')
             ->group(base_path('routes/api/front.php'));
    }
}

<?php

namespace TomIrons\Tuxedo;

use Illuminate\Support\ServiceProvider;

class TuxedoServiceProvider extends ServiceProvider
{
    /**
     * Boot the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tuxedo');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/resources/views' => resource_path('views/vendor/tuxedo'),
            ], 'tomirons-tuxedo');
        }
    }
}
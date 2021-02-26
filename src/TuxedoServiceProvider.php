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

        $this->alterConfiguration();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/tuxedo'),
            ], 'tuxedo-mail');
        }
    }

    /**
     * Modify the markdown configuration.
     *
     * @return void
     */
    public function alterConfiguration()
    {
        config()->set('mail.markdown.paths', array_merge([__DIR__.'/../resources/views'], config('mail.markdown.paths')));
    }
}

<?php

namespace TomIrons\Tuxedo;

use Illuminate\Mail\Markdown;
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
                __DIR__.'/../resources/views' => resource_path('views/vendor/tuxedo'),
            ], 'tuxedo');
        }

        $this->alterConfiguration();
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

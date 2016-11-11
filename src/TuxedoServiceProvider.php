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

        view()->composer(['tuxedo::master', 'tuxedo::templates.action', 'tuxedo::templates.alert', 'tuxedo::templates.invoice'], function($view){
            $style = [
                /* Layout ------------------------------ */

                'body' => 'margin: 0 auto; padding: 0; width: 600px; background-color: #F2F4F6;',
                'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',

                /* Masthead ----------------------- */

                'email-masthead' => 'padding: 25px 0; text-align: center;',
                'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',

                'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
                'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
                'email-body_cell' => 'padding: 35px;',

                'email-header' => 'color: #2F3133; font-size: 24px; font-weight: lighter; text-align: center;',

                'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
                'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',

                /* Body ------------------------------ */

                'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
                'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',

                /* Type ------------------------------ */

                'anchor' => 'color: #3869D4;',
                'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
                'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
                'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
                'paragraph-center' => 'text-align: center;',

                /* Buttons ------------------------------ */

                'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
                 text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',

                'button--green' => 'background-color: #22BC66;',
                'button--red' => 'background-color: #dc4d2f;',
                'button--blue' => 'background-color: #3869D4;',

                /* Alerts ------------------------------ */

                'alert' => 'font-size: 16px; color: #fff; font-weight: 500; padding: 20px; text-align: center; border-radius: 3px 3px 0 0;',
                'alert--anchor' => 'color: #fff; text-decoration: none; font-weight: 500; font-size: 16px;',
                'alert--warning' => 'background-color: #FF9F00;',
                'alert--error' => 'background-color: #D0021B;',
                'alert--success' => 'background-color: #68B90F;',

                /* Invoice ------------------------------ */

                'invoice' => 'margin: 40px auto; text-align: left; width: 400px;',
                'invoice--padding' => 'padding: 5px;',
                'invoice-items' => 'width: 100%',
                'invoice-items--border' => 'border-top: #eee 1px solid;',
                'invoice-items-total' => 'border-top: 2px solid #333; border-bottom: 2px solid #333; font-weight: 700;',

                /* Misc ------------------------------ */

                'no-top-margin' => 'margin-top: 0;',
                'text-right' => 'text-align: right;'
            ];

            $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;';

            $view->with('style', $style);
            $view->with('fontFamily', $fontFamily);
        });
    }
}
<?php namespace Fideloper\Helper;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('headdata', function($app)
        {
            return new Headdata([
                'title' => 'Fideloper',
                'keywords' => 'tech,laravel,api,ubuntu,linux,server,nix,cli,framework,php',
                'description' => "Lead developer @digitalsurgeons. I do LAMP, Laravel, Nodejs, Python, and lots of server stuff."
            ]);
        });
    }

}
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
                'keywords' => 'php,python,nodejs,laravel,api,ubuntu,linux,server,nix,cli,framework',
                'description' => "Coding and servers, lots of Laravel. Open-sorcery."
            ]);
        });
    }

}
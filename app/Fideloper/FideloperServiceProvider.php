<?php namespace Fideloper;

use Illuminate\Support\ServiceProvider;

class FideloperServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ViewHelper', function()
        {
            return new \Fideloper\Facades\ViewHelper();
        });
    }

}
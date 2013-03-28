<?php namespace Fideloper\Storage;

use Illuminate\Support\ServiceProvider;
use Fideloper\Storage\Article\Eloquent\Article;

class StorageServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app->bind('Fideloper\Storage\Article\ArticleInterface', 'Fideloper\Storage\Article\Eloquent\Article');

        $app->bind('Fideloper\Storage\Tag\TagInterface', 'Fideloper\Storage\Tag\Eloquent\Tag');
    }

}
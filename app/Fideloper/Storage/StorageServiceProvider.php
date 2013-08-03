<?php namespace Fideloper\Storage;

use Illuminate\Support\ServiceProvider;
use Fideloper\Storage\Article\Eloquent\Article;
use Fideloper\Storage\Tag\Eloquent\Tag;
use Fideloper\Cache\Memcached;

class StorageServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app->bind('Fideloper\Storage\Article\ArticleInterface', function()
        {
            return new Article( new Memcached('articles', 10) );
        });

        $app->bind('Fideloper\Storage\Tag\TagInterface', function()
        {
            return new Tag( new Memcached('tags', 10) );
        });
    }

}
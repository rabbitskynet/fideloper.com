<?php namespace Fideloper\Storage;

use Fideloper\Cache\LaravelCache;
use Illuminate\Support\ServiceProvider;
use Fideloper\Storage\Tag\Eloquent\Tag as EloquentTag;
use Fideloper\Storage\Article\CacheDecorator as ArticleCacheDecorator;
use Fideloper\Storage\Article\Eloquent\Article as EloquentArticle;


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
            $article = new EloquentArticle;
            return new ArticleCacheDecorator($article, new LaravelCache('articles', 10));
        });

        $app->bind('Fideloper\Storage\Tag\TagInterface', function()
        {
            return new EloquentTag( new LaravelCache('tags', 10) );
        });
    }

}
<?php namespace Fideloper\Storage;

use Fideloper\Cache\LaravelCache;
use Illuminate\Support\ServiceProvider;
use Fideloper\Storage\Tag\Eloquent\Tag as EloquentTag;
use Fideloper\Storage\Tag\CacheDecorator as TagCacheDecorator;
use Fideloper\Storage\Article\Eloquent\Article as EloquentArticle;
use Fideloper\Storage\Article\CacheDecorator as ArticleCacheDecorator;


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
            $tag = new EloquentTag;
            return new TagCacheDecorator($tag, new LaravelCache('tags', 10));
        });
    }

}
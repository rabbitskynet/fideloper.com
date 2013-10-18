<?php namespace Fideloper\Storage\Article;

use Fideloper\Cache\CacheInterface;

class CacheDecorator extends DecoratorAbstract {

    protected $cache;

    public function __construct(ArticleInterface $nextItem, CacheInterface $cache)
    {
        parent::__construct($nextItem);
        $this->cache = $cache;
    }

    public function getRecent($limit=3)
    {
        $key = md5('recent.articles.'.$limit);

        if( $this->cache->has($key) )
        {
            return $this->cache->get($key);
        }

        $articles = $this->nextItem->getRecent($limit);

        $this->cache->put($key, $articles);

        return $articles;
    }

    public function getPaginated($page=1, $limit=10)
    {
        $key = md5('paginated.articles.'.'page.'.$page.'.'.$limit);

        if( $this->cache->has($key) )
        {
            return $this->cache->get($key);
        }

        $paginated = $this->nextItem->getPaginated($page, $limit);

        $this->cache->put($key, $paginated);

        return $paginated;
    }

    public function getBySlug($slug)
    {
        $key = md5('slug.article.'.$slug);

        if( $this->cache->has($key) )
        {
            return $this->cache->get('slug.article.'.md5($slug));
        }

        $article = $this->nextItem->getBySlug($slug);

        $this->cache->put($key, $article);

        return $article;
    }

    public function getByTag($tag, $page=1, $limit=10)
    {
        $key = md5('paginated.taggedarticles.'.'page.'.$page.'.'.$limit);

        if( $this->cache->has($key) )
        {
            return $this->cache->get($key);
        }

        $paginated = $this->nextItem->getByTag($tag, $page, $limit);

        $this->cache->put($key, $paginated);

        return $paginated;
    }

}
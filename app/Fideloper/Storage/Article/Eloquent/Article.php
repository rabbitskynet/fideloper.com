<?php namespace Fideloper\Storage\Article\Eloquent;

use Fideloper\Storage\Article\ArticleInterface;
use Fideloper\Cache\CacheInterface;

class Article implements ArticleInterface {

    protected $article;
    protected $tag;
    protected $cache;

    public function __construct(CacheInterface $cache)
    {
        $this->article = new \Article;
        $this->tag = new \Tag;
        $this->cache = $cache;

    }

    public function getRecent($limit=3)
    {
        // Need to cache per $limit set
        if( $this->cache->has('recent.articles.'.md5($limit)) )
        {
            return $this->cache->get('recent.articles.'.md5($limit));
        }

        $articles = $this->article->where('status_id', 1)
                            ->orderBy('created_at', 'desc')
                            ->take($limit)
                            ->get();

        $this->cache->put('recent.articles.'.md5($limit), $articles);

        return $articles;
    }

    public function getPaginated($limit=10)
    {
        // Cacheing this is trickier due to needing paged attributes
        // Would need page service to handle changes in pagination styles
        // for maintainability
        return $this->article->where('status_id', 1)
                            ->orderBy('created_at', 'desc')
                            ->paginate($limit);
    }

    public function getBySlug($slug)
    {
        // Need to cache each article separately
        if( $this->cache->has('slug.article.'.md5($slug)) )
        {
            return $this->cache->get('slug.article.'.md5($slug));
        }

        $article =  $this->article->with('tags')
                            ->where('status_id', 1)
                            ->where('url_title', $slug)
                            ->first();

        $this->cache->put('slug.article.'.md5($slug), $article);

        return $article;
    }

    public function getByTag($tag, $limit=10)
    {
        $foundTag = $this->tag->where('url_name', $tag)->first();

        if( !$foundTag )
        {
            return array();
        }

        return $this->article->join('tags_articles', 'articles.id', '=', 'tags_articles.article_id')
                                  ->where('tags_articles.tag_id', $foundTag->id)
                                  ->where('articles.status_id', 1)
                                  ->orderBy('articles.created_at', 'desc')
                                  ->paginate($limit);
    }

    public function getByDate($monthyear)
    {
        return array();
    }

}

<?php namespace Fideloper\Storage\Article\Eloquent;

use Fideloper\Storage\Article\ArticleInterface;

class Article implements ArticleInterface {

    protected $article;
    protected $tag;

    public function __construct()
    {
        $this->article = new \Article;
        $this->tag = new \Tag;
    }

    public function getRecent($limit=3)
    {

        return $this->article->where('status_id', 1)
                            ->orderBy('created_at', 'desc')
                            ->take($limit)
                            ->get();
    }

    public function getPaginated($page=1, $limit=10)
    {
        $result = new \StdClass;
        $result->page = $page;
        $result->limit = $limit;
        $result->totalItems = 0;
        $result->items = array();

        $articles = $this->article->where('status_id', 1)
                            ->orderBy('created_at', 'desc')
                            ->skip( $limit * ($page-1) )
                            ->take( $limit )
                            ->get();

        $result->totalItems = $this->totalArticles();
        $result->items = $articles->all();

        return $result;
    }

    public function getBySlug($slug)
    {
        return $this->article->with('tags')
                            ->where('status_id', 1)
                            ->where('url_title', $slug)
                            ->first();
    }

    public function getByTag($tag, $page=1, $limit=10)
    {
        $foundTag = $this->tag->where('url_name', $tag)->first();

        $result = new \StdClass;
        $result->page = $page;
        $result->limit = $limit;
        $result->totalItems = 0;
        $result->items = array();

        if( !$foundTag )
        {
            return $result;
        }

        $articles = $this->article->join('tags_articles', 'articles.id', '=', 'tags_articles.article_id')
                                    ->where('tags_articles.tag_id', $foundTag->id)
                                    ->where('articles.status_id', 1)
                                    ->orderBy('articles.created_at', 'desc')
                                    ->skip( $limit * ($page-1) )
                                    ->take( $limit )
                                    ->get();

        $result->totalItems = $this->totalArticlesByTagId( $foundTag->id );
        $result->items = $articles->all();

        return $result;
    }

    protected function totalArticles()
    {
        return $this->article->where('status_id', 1)->count();
    }

    protected function totalArticlesByTagId($tagId)
    {
        return $this->article->join('tags_articles', 'articles.id', '=', 'tags_articles.article_id')
                                  ->where('tags_articles.tag_id', $tagId)
                                  ->where('articles.status_id', 1)
                                  ->count();
    }

    public function getByDate($monthyear)
    {
        return array();
    }

}

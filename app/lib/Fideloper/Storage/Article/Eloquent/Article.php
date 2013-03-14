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

    public function getRecent($limit=3) {

        return $this->article->orderBy('created_at', 'desc')
                           ->take(3)
                           ->get();

    }

    public function getPaginated($limit=10)
    {
        return $this->article->paginate($limit);
    }

    public function getBySlug($slug)
    {
        return $this->article->where('url_title', $slug)->first();
    }

    public function getByTag($tag)
    {
        $foundTag = $this->tag->with('articles')->where('name', $tag)->first();

        return $foundTag->articles;
    }

    public function getByDate($monthyear)
    {
        return [];
    }
}
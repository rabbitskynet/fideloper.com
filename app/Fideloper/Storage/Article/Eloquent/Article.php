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

    public function getPaginated($limit=10)
    {
        return $this->article->where('status_id', 1)
                            ->orderBy('created_at', 'desc')
                            ->paginate($limit);
    }

    public function getBySlug($slug)
    {
        return $this->article->with('tags')
                            ->where('status_id', 1)
                            ->where('url_title', $slug)
                            ->first();
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

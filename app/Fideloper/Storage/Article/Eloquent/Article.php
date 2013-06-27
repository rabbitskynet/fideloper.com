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

    public function getByTag($tag)
    {
        $foundTag = $this->tag->with(['articles' => function($query) {
            $query->where('status_id', 1)
		  ->orderBy('created_at', 'desc');
        }])->where('url_name', $tag)
           ->first();

        if( !$foundTag )
        {
            return [];
        }

        return $foundTag->articles;
    }

    public function getByDate($monthyear)
    {
        return [];
    }

}

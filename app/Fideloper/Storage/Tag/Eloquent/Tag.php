<?php namespace Fideloper\Storage\Tag\Eloquent;

use Fideloper\Storage\Tag\TagInterface;
use Fideloper\Cache\CacheInterface;

class Tag implements TagInterface {

    protected $tag;
    protected $cache;

    public function __construct(CacheInterface $cache)
    {
        $this->tag = new \Tag;
        $this->cache = $cache;

    }

    public function getPopular($limit=8)
    {
        return \DB::table('tags_articles')->select('name', 'url_name', 'tag_id', \DB::raw('count(`tag_id`) as `tag_count`'))
                                        ->join('tags', 'tags.id', '=', 'tags_articles.tag_id')
                                        ->join('articles', 'articles.id', '=', 'tags_articles.article_id')
                                        ->where('articles.status_id', 1)
                                        ->groupBy('tag_id')
                                        ->orderBy('tag_count', 'DESC')
                                        ->take($limit)
                                        ->get();
    }

}
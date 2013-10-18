<?php namespace Fideloper\Storage\Article;

abstract class DecoratorAbstract implements ArticleInterface {

    protected $nextItem;

    public function __construct(ArticleInterface $nextItem)
    {
        $this->nextItem = $nextItem;
    }

    public function getRecent($limit=3)
    {
        return $this->nextItem->getRecent($limit);
    }

    public function getPaginated($page=1, $limit=10)
    {
        return $this->nextItem->getPaginated($page, $limit);
    }

    public function getBySlug($slug)
    {
        return $this->nextItem->getBySlug($slug);
    }

    public function getByTag($tag, $page=1, $limit=10)
    {
        return $this->nextItem->getByTag($tag);
    }

    public function getByDate($monthyear)
    {
        return $this->nextItem->getByDate($monthyear);
    }

}
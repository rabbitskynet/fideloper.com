<?php namespace Fideloper\Storage\Tag;

abstract class DecoratorAbstract implements TagInterface {

    protected $nextItem;

    public function __construct(TagInterface $nextItem)
    {
        $this->nextItem = $nextItem;
    }

    public function getPopular($limit=8)
    {
        return $this->nextItem->getPopular($limit);
    }
}
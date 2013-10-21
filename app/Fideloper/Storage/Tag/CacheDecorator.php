<?php namespace Fideloper\Storage\Tag;

use Fideloper\Cache\CacheInterface;

class CacheDecorator extends DecoratorAbstract{

    protected $cache;

    public function __construct(TagInterface $nextItem, CacheInterface $cache)
    {
        parent::__construct($nextItem);
        $this->cache = $cache;
    }

    public function getPopular($limit=8)
    {
        $key = md5('popular.tags.'.$limit);

        if( $this->cache->has($key) )
        {
            return $this->cache->get($key);
        }

        $tags = $this->nextItem->getPopular($limit);

        $this->cache->put($key, $tags);

        return $tags;
    }
}
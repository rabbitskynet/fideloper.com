<?php

use Fideloper\Resource\Eloquent\Resource;

class TagArticle extends Resource {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags_articles';

    protected $fillable = array(
        'tag_id',
        'article_id',
    );

}
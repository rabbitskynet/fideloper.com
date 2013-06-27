<?php

class TagArticle extends Eloquent {

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
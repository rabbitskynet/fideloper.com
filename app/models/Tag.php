<?php

class Tag extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';

    public function articles()
    {   
        // Probably shouldbe hasMany
        return $this->belongsToMany('Article', 'tags_articles', 'tag_id', 'article_id');
    }

}
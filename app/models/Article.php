<?php

class Article extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles';

    public function tags()
    {
        return $this->belongsToMany('Tag', 'tags_articles', 'article_id', 'tag_id');
    }

    public function status()
    {
        return $this->belongsTo('Status');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

}
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
        $this->belongsToMany('Tag', 'tags_articles', 'tag_id', 'article_id');
    }

    public function status()
    {
        $this->hasOne('Status');
    }

    public function user()
    {
        $this->belongsTo('User');
    }

}
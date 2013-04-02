<?php

use Fideloper\Resource\Eloquent\Resource;

class Status extends Resource {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'statuses';

    public function articles()
    {
        return $this->hasMany('Article');
    }

}
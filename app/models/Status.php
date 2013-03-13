<?php

class Status extends Eloquent {

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
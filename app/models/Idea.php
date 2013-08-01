<?php

class Idea extends Eloquent {

    protected $table = 'cookbook';

    protected $softDelete = true;

    protected $fillable = array('name', 'idea');

}
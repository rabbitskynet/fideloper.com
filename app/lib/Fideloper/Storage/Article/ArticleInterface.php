<?php namespace Fideloper\Storage\Article;

interface ArticleInterface {

    public function getRecent($limit=3);

    public function getPaginated($limit=10);

    public function getBySlug($slug);

    public function getByTag($tag);

    public function getByDate($monthyear);

    public function getEtag();

}
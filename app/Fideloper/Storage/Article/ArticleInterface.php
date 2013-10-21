<?php namespace Fideloper\Storage\Article;

interface ArticleInterface {

    public function getRecent($limit=3);

    public function getPaginated($page=1, $limit=10);

    public function getBySlug($slug);

    public function getByTag($tag, $page=1, $limit=10);

    public function getByDate($monthyear);

}
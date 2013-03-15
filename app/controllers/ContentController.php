<?php

class ContentController extends BaseController {

	protected $layout = 'layouts.site';

	protected $article;

	public function __construct(Fideloper\Storage\Article\ArticleInterface $article)
	{
		$this->article = $article;
	}

	/**
	* Display listing of latest articles
	*/
	public function index()
	{	
		$articles = $this->article->getPaginated();

		$this->layout->content = View::make('content.home')->with('articles', $articles);
	}

	/**
	* Display specific article
	*/
	public function article($slug)
	{
		$article = $this->article->getBySlug($slug);
		$recents = $this->article->getRecent();

		if( !$article )
		{
			App::abort(404);
		}

		$this->layout->content = View::make('content.article', [
			'article' => $article,
			'recents' => $recents
		]);
	}

	/**
	* Display articles under a tag
	*/
	public function tag($tag)
	{
		$articles = $this->article->getByTag($tag);

		if( count($articles) === 0 )
		{
			App::abort(404);
		}

		$this->layout->content = View::make('content.tags', [
			'articles' => $articles,
			'tag' => $tag
		]);
	}

	/**
	* Display articles in a time range
	*/
	public function archive($date)
	{
		return $date;
	}

}
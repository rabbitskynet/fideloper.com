<?php

class ContentController extends BaseController {

	 protected $layout = 'layouts.site';

	/**
	* Display listing of latest articles
	*/
	public function index()
	{	
		$articles = Article::all();

		$this->layout->content = View::make('content.home')->with('articles', $articles);
	}

	/**
	* Display specific article
	*/
	public function article($slug)
	{
		$article = Article::where('url_title', $slug)->first();

		if( !$article )
		{
			App::abort(404);
		}

		$this->layout->content = View::make('content.article')
			 ->with('article', $article);
	}

	/**
	* Display articles under a tag
	*/
	public function tag($tag)
	{
		return $tag;
	}

	/**
	* Display articles in a time range
	*/
	public function archive($date)
	{
		return $date;
	}

}
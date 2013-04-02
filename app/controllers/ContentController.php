<?php

class ContentController extends BaseController {

	protected $layout = 'layouts.site';

	protected $article;
	protected $tag;

	public function __construct(Fideloper\Storage\Article\ArticleInterface $article, Fideloper\Storage\Tag\TagInterface $tag)
	{
		$this->article = $article;
		$this->tag = $tag;
	}

	/**
	* Display listing of latest articles
	*
	* @todo handle "no articles" situation?
	*/
	public function index()
	{
		$articles = $this->article->getPaginated();

		// Generate ETag that represents current items ETag
		$etag = '';

		foreach( $articles as $article )
		{
			$etag .= $article->getEtag();
		}

		$resEtag = md5($etag);

		// Abort if request ETag matches this one
		$reqEtags = Request::getEtags();

		if ( isset($reqEtags[0]) )
		{
			$reqEtags = str_replace('"', '', $reqEtags[0]);

			if ( $reqEtags === $resEtag ) {
				App::abort(304);
			}
		}

		$tags = $this->tag->getPopular();

		$this->layout->content = View::make('content.home')->with('articles', $articles)->with('tags', $tags);

		$response = Response::make($this->layout, 200);
		$response->setEtag( $resEtag );

		return $response;
	}

	/**
	* Display specific article
	*/
	public function article($slug)
	{
		$article = $this->article->getBySlug($slug);

		if( !$article )
		{
			App::abort(404);
		}

		$recents = $this->article->getRecent();

		$resEtag = $article->getEtag();

		// Abort if request ETag matches this one
		$reqEtags = Request::getEtags();

		if ( isset($reqEtags[0]) )
		{
			$reqEtags = str_replace('"', '', $reqEtags[0]);

			if ( $reqEtags === $resEtag ) {
				App::abort(304);
			}
		}

		// Head data
		$tags = [];
		foreach( $article->tags as $tag )
		{
			$tags[] = $tag->name;
		}

		$head = App::make('headdata');
		$head->add('title', $article->title.' | Fideloper');
		$head->add('keywords', implode(',', $tags));

		// Output Article
		$this->layout->content = View::make('content.article', [
			'article' => $article,
			'recents' => $recents,
			'context' => array(
				'where' => 'frontend'
			)
		]);

		$response = Response::make($this->layout, 200);
		$response->setEtag( $resEtag );

		return $response;
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

		// ETag based on collection of results, not the tag itself
		$resEtag = $articles->getEtags();

		// Abort if request ETag matches this one
		$reqEtags = Request::getEtags();

		if ( isset($reqEtags[0]) )
		{
			$reqEtags = str_replace('"', '', $reqEtags[0]);

			if ( $reqEtags === $resEtag ) {
				App::abort(304);
			}
		}

		$tags = $this->tag->getPopular();

		// Head data
		$head = App::make('headdata');
		$head->add('title', $tag . ' | Fideloper');

		// Output Articles
		$this->layout->content = View::make('content.tags', [
			'articles' => $articles,
			'tag' => $tag,
			'tags' => $tags,
		]);

		$response = Response::make($this->layout, 200);
		$response->setEtag( $resEtag );

		return $response;
	}

	/**
	* Display articles in a time range
	*/
	public function archive($date)
	{
		return $date;
	}

	public function feed()
	{
		$feed = new Suin\RSSWriter\Feed();
		$channel = new Suin\RSSWriter\Channel();

		$channel
		    ->title( "Fideloper" )
		    ->description( "Lead dev @digitalsurgeons. I do LAMP, Laravel, Nodejs, Python, and lots of server stuff." )
		    ->url( 'http://fideloper.com' )
		    ->appendTo( $feed );

		$articles = $this->article->getRecent(30);

		foreach( $articles as $article )
		{
			$item = new Suin\RSSWriter\Item();

			$item
			    ->title( $article->title )
			    ->description( $article->excerpt )
			    ->url( 'http://fideloper.com/'.$article->url_title )
			    ->appendTo( $channel );
		}

		return Response::make($feed, 200, ['Content-Type' => 'application/xml']);

	}

}
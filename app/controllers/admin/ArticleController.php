<?php

class ArticleController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @todo   Pagination
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::with('user')->with('status')->get();

		return View::make('layouts.admin')
			->with('body_class', 'admin article')
			->nest('nav', 'layouts.admin.nav', ['adminGroup' => Config::get('admin.group')])
			->nest('content', 'admin.articles', [
				'articles' => $articles,
				'adminGroup' => Config::get('admin.group'),
			]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$authors = User::all();
		$statuses = Status::all();

		return View::make('layouts.admin')
			->with('body_class', 'admin article create')
			->nest('nav', 'layouts.admin.nav', ['adminGroup' => Config::get('admin.group')])
			->nest('content', 'admin.articles.create', [
				'input' => Session::getOldInput(),
				'authors' => $authors,
				'statuses' => $statuses,
				'adminGroup' => Config::get('admin.group'),
			]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @todo   Validation, Filter Markdown
	 * @return Response
	 */
	public function store()
	{
		// Validation plz, kthnx
		Article::create( Input::all() );
		return Redirect::to('admin/article');
	}

	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function show($id)
	{
		// In context of admin area, we go to edit
		return Redirect::to('admin/article/'.$id.'/edit');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$article = Article::find($id);
		$authors = User::all();
		$statuses = Status::all();

		if ( is_object($article) )
		{
			return View::make('layouts.admin')
				->with('body_class', 'admin article edit')
				->nest('nav', 'layouts.admin.nav', ['adminGroup' => Config::get('admin.group')])
				->nest('content', 'admin.articles.edit', [
					'article' => $article,
					'authors' => $authors,
					'statuses' => $statuses,
					'adminGroup' => Config::get('admin.group'),
				]);
		}
		return Redirect::to('admin/article');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @todo   Validation, Filter Markdown
	 * @return Response
	 */
	public function update($id)
	{
		$article = Article::find($id);

		$article->user_id = Input::get('user_id');
		$article->status_id = Input::get('status_id');
		$article->title = Input::get('title');
		$article->url_title = Input::get('url_title');
		$article->excerpt = Input::get('excerpt');
		$article->content = Input::get('content');

		$article->save();

		return Redirect::to('admin/article/'.$id.'/edit');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = Article::find($id);
		$deleted = Status::where('name', 'Deleted')->get();

		$article->status = $deleted->id;
		$article->save();

		return Redirect::to('admin/article/');
	}

}
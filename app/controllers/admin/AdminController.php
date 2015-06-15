<?php

class AdminController extends BaseController {

	public $layout = 'layouts.admin';

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// List of Articles instead
		$articles = Article::with('user')->with('status')->orderBy('created_at', 'desc')->paginate(20);

		return View::make('layouts.admin')
			->with('body_class', 'admin article')
			->nest('nav', 'layouts.admin.nav', ['adminGroup' => Config::get('admin.group')])
			->nest('content', 'admin.articles', [
				'articles' => $articles,
				'adminGroup' => Config::get('admin.group'),
			]);

		$user = Auth::user();

		return View::make('layouts.admin')
			->with('body_class', 'admin')
			->nest('nav', 'layouts.admin.nav', ['adminGroup' => Config::get('admin.group')])
			->nest('content', 'admin.index');

	}

}
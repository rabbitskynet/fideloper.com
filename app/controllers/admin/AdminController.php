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
		$user = Auth::user();

		return View::make('layouts.admin')
			->with('body_class', 'admin')
			->nest('nav', 'layouts.admin.nav', ['adminGroup' => Config::get('admin.group')])
			->nest('content', 'admin.index');
	}

}
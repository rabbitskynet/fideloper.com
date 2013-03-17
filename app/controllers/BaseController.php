<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
			$this->layout->header_meta = View::make('layouts.meta')->with('head', App::make('headdata'));
			$this->layout->scripts = View::make('layouts.scripts')->with('gacode', Config::get('analytics.ga-code'));
		}
	}

}
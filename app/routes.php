<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'admin'), function()
{
    Route::get('/login', function()
    {
        return View::make('admin.login');
    });

    Route::post('/login', function()
    {
        //Test authentication
        $authenticated = Auth::attempt( ['email' => Input::get('email'), 'password' => Input::get('password')] );
        if ( $authenticated )
        {
            // Logged in!
            return Redirect::to('/admin');
        } else {
            // Incorrect Login
            return Redirect::to('/admin/login')->with('auth_error', 'Username or Password Incorrect');
        }
    });

    Route::resource('/', 'AdminController');
    Route::resource('article', 'ArticleController');
    Route::resource('user', 'UserController');
});
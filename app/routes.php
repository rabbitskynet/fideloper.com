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

/**
* Routing for Admin Area
*/
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


/**
* Routing to handle 301 redirects from Tumblr URLs
*/
Route::get('/post/{id}/{slug}', function($id, $slug) {

    return Redirect::to('/'.$slug, 301);

})->where('id','[0-9]+')->where('slug', '[A-Za-z\-0-9]+');


/**
* Blog content routing
*/
Route::get('/', 'ContentController@index');
Route::get('/tag/{tag}', 'ContentController@tag');
Route::get('/archive/{date}', 'ContentController@archive');
Route::get('/{slug}', 'ContentController@article');
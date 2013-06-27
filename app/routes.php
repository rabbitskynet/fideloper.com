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

$adminGroup = Config::get('admin.group');

Route::group(array('prefix' => $adminGroup), function() use($adminGroup)
{
    Route::get('/login', function() use($adminGroup)
    {
        return View::make('layouts.admin')
            ->with('body_class', 'admin login')
            ->nest('nav', 'layouts.admin.navlogin', ['adminGroup' => $adminGroup])
            ->nest('content', 'admin.login', ['adminGroup' => $adminGroup]);
    });

    Route::post('/login', function() use ($adminGroup)
    {
        //Test authentication
        $authenticated = Auth::attempt( ['email' => Input::get('email'), 'password' => Input::get('password')] );
        if ( $authenticated )
        {
            // Logged in!
            return Redirect::to('/'.$adminGroup);
        } else {
            // Incorrect Login
            return Redirect::to('/'.$adminGroup.'/login')->with('auth_error', 'Username or Password Incorrect');
        }
    });

    Route::get('/logout', function()
    {
        Auth::logout();

        return Redirect::to('/'.Config::get('admin.group'));
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
* Sitemap.xml
*
* @todo cacheing
*/
Route::get('/sitemap.xml', function() {

    // Grab all artiles for xml generation
    $articles = DB::table('articles')->select('title', 'url_title', 'updated_at')->orderBy('created_at', 'asc')->get();

    // Grab latest updated article for 'last modified'
    $latest = DB::table('articles')->select('updated_at')->orderBy('updated_at', 'desc')->first();

    // Get XML
    $content = View::make('sitemap')
                ->with('articles', $articles)
                ->with('latest', $latest);

    // Respond with proper content type
    return Response::make($content, 200, ['Content-Type' => 'text/xml']);
});


/**
* Blog content routing
*/
Route::get('/', 'ContentController@index');
Route::get('/feed', 'ContentController@feed');
Route::get('/tag/{tag}', 'ContentController@tag');
Route::get('/archive/{date}', 'ContentController@archive');
Route::get('/{slug}', 'ContentController@article');
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
    Route::resource('cookbook', 'CookbookController');
});


/**
* Routing for Laravel Cookbook
*/

Route::get('/laravel-cookbook', function()
{
    $status = '';

    if( Session::has('status') )
    {
        $status = Session::get('status');
    }

    return View::make('cookbook.form')->with(array(
        'status' => $status
    ));
});

Route::post('/laravel-cookbook', function()
{
    // Honeypot
    if( Input::get('email') )
    {
        throw new Symfony\Component\HttpKernel\Exception\HttpException(500, 'You are a robot');
    }

    // Human
    Validator::extend('human', function($attribute, $value, $parameters)
    {
        return $value == '2';
    });

    // Validate
    $validator = Validator::make(
        array(
            'description' => Input::get('description'),
            'name' => Input::get('name'),
            'human' => Input::get('human'),
        ),
        array(
            'description' => 'required',
            'name' => 'required',
            'human' => 'required|integer|human',
        ),
        array(
            'human' => 'You must do the math correctly',
        )
    );

    if( $validator->fails() )
    {
        // Redirect with error
        return Redirect::to('/laravel-cookbook')->withInput(Input::all())->withErrors($validator)->with('status', 'error');
    }

    // Sanitize
    $description = filter_var(Input::get('description'), FILTER_SANITIZE_STRING);
    $name  = filter_var(Input::get('name'), FILTER_SANITIZE_STRING);

    // Save description to db
    Idea::create(array(
        'name' => $name,
        'idea' => $description,
    ));

    // Redirect with success
    return Redirect::to('/laravel-cookbook')->with('status', 'success');
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
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

interface BarInterface {}

class Bar implements BarInterface {}

class SecondBar implements BarInterface {}

// binding through config
App::bind(BarInterface::class, Bar::class);

/*
Route::get('bar', function(BarInterface $bar){
    // laravel do automatically
    dd($bar);
});
*/

Route::get('bar', function(){
    // resolve dependency
    //$bar = App::make('BarInterface');
    //$bar = app()->make(BarInterface::class);
    //$bar = app()[BarInterface::class];
    $bar = app(BarInterface::class);
    dd($bar);
});

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function(){
    return view('welcome');
});

Route::get('foo', 'FooController@foo');

Route::get('pages', 'PagesController@index');
Route::get('pages/about', ['middleware' => 'auth', 'uses' => 'PagesController@about']);
Route::get('pages/create', 'PagesController@create');


//Route::get('article', 'ArticleController@index');
//Route::get('article/create', 'ArticleController@create');
//Route::post('article/add', 'ArticleController@add');
//// make sure that wildcard will come at the end
//Route::get('article/{id}', 'ArticleController@detail');

// replace all above
Route::resource('article', 'ArticleController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

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


	Route::get('/', 'HomeController@showWelcome');
<<<<<<< HEAD

    Route::controller("TreeView", "TreeViewController");
=======
  Route::get('/ui','HomeController@showUI');
>>>>>>> b31eb365e3d8424248473ceb6757f3ec1a40820c
/*
Route::get('/', function()
{
	return View::make('hello');
});
*/
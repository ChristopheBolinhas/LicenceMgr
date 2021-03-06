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
    //seleEvent::listen('illuminate.query', function($query) { var_dump($query); });

	Route::get('/', 'HomeController@showUI');
    Route::get('/tabs/user', 'HomeController@uiUser');
	Route::get('/tabs/admin', 'HomeController@uiAdmin');
	Route::get('/tabs/superadmin', 'HomeController@uiSuperAdmin');

    Route::controller("TreeView", "TreeViewController");

    Route::controller("program", "ProgramController");
    Route::controller("editor", "EditorController");
    Route::controller("sheet", "SheetController");
    Route::controller("licence", "LicenceController");
    Route::controller("company", "CompanyController");
    Route::controller("lang", "LangController");

    Route::controller('auth', 'AuthController');

    Route::get('/ui','HomeController@showUI');
    Route::get('/test','HomeController@test');

/*
Route::get('/', function()
{
	return View::make('hello');
});
*/
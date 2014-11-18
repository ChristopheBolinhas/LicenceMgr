<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    public function showUI() {   
        return View::make('mainTemplate');
    }
  

	public function showWelcome() {

	}
    
    public function uiSuperAdmin() {
        return View::make("tabs/superAdmin");
    }
    
    public function uiAdmin() {
        return View::make("tabs/admin");
    }

}

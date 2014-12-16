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
       
        return View::make('mainTemplate')->with("currentLang", App::getLocale()); 
    }


    public function showWelcome() {

    }
    public function test() {
        return View::make("test");
    }
    public function uiSuperAdmin() {
        if(Auth::user()->IsSuperAdmin())
        {
            
            return View::make("tabs/superAdmin")->with("companies", Company::all());
        }
    }

    public function uiAdmin() {
        if(Auth::user()->IsAdmin() || Auth::user()->IsSuperAdmin())
        {
            
            return View::make("tabs/admin")->with("users",User::all());
        }
    }
    public function uiUser() {
        if(Auth::user()->IsReadOrWrite() || Auth::user()->IsAdmin())
        {
            
            return View::make("tabs/user");
        }
    }


}

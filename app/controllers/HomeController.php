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
    
    private function setLang(){
        if (Session::has('lang'))
        {
            App::setLocale(Session::get('lang'));
        }
        else
            {
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            switch($lang){
                     case 'fr':
                         App::setLocale('fr');
                         //App::setLocale('fr');
                         break;
                     case 'de':
                         App::setLocale('de');
                         //App::setLocale('de');
                         break;
                     case 'en':
                         App::setLocale('en');
                         //App::setLocale('en');
                         break;
                     default:
                         App::setLocale('fr');
                         //App::setLocale('fr');
                 }    
        }
        
    }
    
    public function showUI() {   
        $this->setLang();
        if (Session::has('lang'))
        {
            App::setLocale(Session::get('lang'));
        }
        //App::setLocale('en');
        return View::make('mainTemplate');
    }


	public function showWelcome() {

	}
    
    public function uiSuperAdmin() {
        //setLang();
        if (Session::has('lang'))
        {
            App::setLocale(Session::get('lang'));
        }
        //App::setLocale('en');
        return View::make("tabs/superAdmin")->with("companies", Company::all());
    }
    
    public function uiAdmin() {
        //setLang();
        if (Session::has('lang'))
        {
            App::setLocale(Session::get('lang'));
        }
         //App::setLocale('en');
        return View::make("tabs/admin")->with("users",User::all());
    }

}

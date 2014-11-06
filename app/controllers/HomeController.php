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
  public function showUI()
  {
    
    $userCompany = 
    $companies = Company::all();
    
    
    
    return View::make('mainTemplate')->with('editorList_public',$companies);
  }
  
  
	public function showWelcome()
	{
    ob_start();
    
    echo Company::all() ."\r\n";
    echo Editor::all() ."\r\n";
    //echo Program::all() ."\r\n";
    //echo Role::all() ."\r\n";
    
    /*
    $var = Company::find(1);
    print_r($var);
    if ($var == null) {
        $var = new Company();
    }
    $var->Name = "ISIC";
    print_r($var);
    
    $var->save();
    print_r($var);
    echo Company::all();
    */
    //$response = Response::make($var, 200);
    $out = ob_get_contents();

    ob_end_clean();
    $response = Response::make($out,200);

  $response->header('Content-Type',"text/plain");

    return $response;
    return var_export(Company::all(), true);
		return View::make('hello');
	}

}

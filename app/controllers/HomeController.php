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
        $companies = Company::all(); 
        return View::make('mainTemplate')->with('editorList_public',$companies);                                      
    }   
    
    
	public function showWelcome()
	{
    ob_start();
    
    echo "01 ". Company::all() ."\r\n";
    echo "02 ". Editor::all() ."\r\n";
    echo "03 ". Editor::find(3) ."\r\n";
    echo "04 ". Editor::find(3)->company ."\r\n";
    echo "\r\n";
    echo "05 ". Program::find(3) ."\r\n";
    echo "06 ". Program::find(3)->parent ."\r\n";
    echo "07 ". Program::find(3)->company ."\r\n";
    echo "08 ". Program::find(3)->Licences ."\r\n";
    echo "09 ". Program::find(5)->company ."\r\n";
    echo "\r\n";
    echo "10 ". Licence::find(1) ."\r\n";
    echo "11 ". Licence::find(1)->company ."\r\n";
    echo "12 ". Licence::find(1)->program ."\r\n";
    echo "13 ". Licence::find(1)->Sheets ."\r\n";
    echo "\r\n";
    echo "14 ". Sheet::all() ."\r\n";
    echo "\r\n";
    echo "15 ". Company::find(1) ."\r\n";
    echo "16 ". Company::find(1)->programs ."\r\n";
    echo "17 ". Company::find(1)->editors ."\r\n";
    echo "18 ". Company::find(1)->licences ."\r\n";
        
    //echo "5 ". User::find(1) ."\r\n";
    //echo User::find(1).roles ."\r\n";
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

<?php

class LangController extends BaseController {
    public function getMsg()
    {
        $content = "var msgs = {};";
        foreach(Lang::get('javascript') as $key => $value)
        {
          $content .= $this->addVar($key, $value);  
        }
        $statusCode = 200;
        $response = Response::make($content,$statusCode);
        $response->header("Content-Type", "application/javascript");
        return $response;
    }
    private function addVar($key, $value){
        return "msgs.$key = '$value';";
        
        
    }
    
    public function getLang($lang)
    {
        if (Session::has('lang'))
        {
             $current_lang = Session::get('lang');
             
        }
        else{
            $current_lang = "";
            //Session::put('lang', 'fr');
        }
        if($current_lang != $lang)
             {
                 switch($lang){
                     case 'de':
                         Session::put('lang', 'de');
                         // App::setLocale('de');
                         //App::setLocale('de');
                         break;
                     case 'en':
                         Session::put('lang', 'en');
                         // App::setLocale('en');
                         //App::setLocale('en');
                         break;
                     case 'fr':
                     default:
                         Session::put('lang', 'fr');
                          //App::setLocale('fr');
                         //App::setLocale('fr');
                 }    
             }
        
        return Redirect::back();
        
    }




}
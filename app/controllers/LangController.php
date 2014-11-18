<?php

class LangController extends BaseController {
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
                     case 'fr':
                         Session::put('lang', 'fr');
                         //App::setLocale('fr');
                         break;
                     case 'de':
                         Session::put('lang', 'de');
                         //App::setLocale('de');
                         break;
                     case 'en':
                         Session::put('lang', 'en');
                         //App::setLocale('en');
                         break;
                     default:
                         Session::put('lang', 'fr');
                         //App::setLocale('fr');
                 }    
             }
        
        return Redirect::back();
        
    }




}
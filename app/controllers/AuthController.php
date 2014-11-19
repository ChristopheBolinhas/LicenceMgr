<?php

class AuthController extends BaseController {
    
    /*
    public function getLogin()
    {
        return View::make('login');    
    }
    */
    
    public function postLogin()
    {    
        $user = array(
            'username' => Input::get('name'),
            'password' => Input::get('password')
        );
        
        if(Auth::attempt($user,Input::get('souvenir')))
        {
            return Redirect::to('/');
        }
        else
        {
            return Redirect::to('/')->with('error', 'Les informations d\'identification ne sont pas corrects !')->withInput();    
        }
    }
    public function getOnetimeuser()
        {
        $password = Hash::make('1234');
            $user = new User;
            $user->company_id = 1;
            $user->fullname = "lala";
            $user->username = "juust";
            $user->password = $password;
            $user->email = "lala@dsa.com";
        $user->remember_token = false;
            $user->save();
    }
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
    
    public function getAdd()
    {       
        return View::make('user/register');
    }
    
    public function postAdd()
    {
        $user = new User;
        $user->fullname = Input::get('fullname');
        $user->username = Input::get('login');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->company_id = 1;
        $user->remember_token = false;
        $user->save();                             
        $checkbox = array(Input::get('readOnly'),Input::get('keyMaster'),Input::get('other'));
    }
}
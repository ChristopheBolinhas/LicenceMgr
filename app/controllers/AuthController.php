<?php

class AuthController extends BaseController {
    
    public function getLogin()
    {
        return View::make('user/login');    
    }
    
    public function postLogin()
    {    
        $user = array(
            'username' => Input::get('name'),
            'password' => Input::get('password')
        );
        
        if(Auth::attempt($user,Input::get('souvenir')))
        {
            return Redirect::to("/");   
        }
        else
        {
            App::abort();
        }
    }
    public function getOnetimeuser()
        {
        $password = Hash::make('1234');
            $user = new User;
            $user->company_id = 1;
            $user->fullname = "lala";
            $user->username = "peter";
            $user->password = $password;
            $user->email = "lala@dsa.com";
        $user->remember_token = false;
            $user->save();
    }
    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('user.index');
    }
}
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
        return View::make('user/register')->with("companies", Company::all())->with("roles", Role::all());
    }
    
    public function postAdd()
    {
        $fullname = Input::get('fullname');
        $username = Input::get('login');
        $email = Input::get('email');
        
        if(!empty($fullname) && !empty($username) && !empty($email))
        {
            $companyId = Input::get('companies');
            $user = new User;
            $user->fullname = $fullname;
            $user->username = $username;
            $user->email = $email;
            $user->password = Hash::make(Input::get('password'));
            $user->company_id = $companyId;
            $user->remember_token = false;
            $user->save();                             
            $checkbox = array(Input::get('readOnly'),Input::get('keyMaster'),Input::get('other'));
        }
        else
        {
            App::abort(400);    
        }
    }
    
    public function getEdit($id)
    {
         return View::make('user/register')->with('user',User::findOrFail($id))->with("companies", Company::all())->with("roles", Role::all());
    }
}
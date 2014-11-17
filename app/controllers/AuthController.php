<?php

use Validation\UserLoginValidator as UserLoginValidator;

class AuthController extends BaseController {
    
    protected $login_validation;
    
    public function __construct(UserLoginValidator $login_validation)
    {
        parent::__construct();
        $this->login_validation = $login_validation;
    }
    
    public function getLogin()
    {
        return View::make('user/login');    
    }
    
    public function postLogin()
    {
        if($this->login_validation->fails())
        {
            return Redirect::to('auth/login')->withErrors($this->login_validation->errors())->withInput();    
        }
        else
        {
            $user = array(
                'name' => Input::get('name'),
                'password' => Input::get('password')
            );
            
            if(Auth::attempt($user,Input::get('souvenir')))
            {
                Return Redirect::intended('user');    
            }
            return Redirect::to('auth/login')
                ->with('pass','Le mot de passe n\'est pas correct !')->withInput();
        }
    }
    
    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('user.index');
    }
}
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
            $user->username = "writer";
            $user->password = $password;
            $user->email = "lala@dsa.com";
            $user->remember_token = false;
            
            $user->save();
            //$user->makeRole(Role::ROLE_SUPERADMIN);
            //$user->makeRole(Role::ROLE_ADMIN);
            $user->makeRole(Role::ROLE_WRITE);
            //$user->makeRole(Role::ROLE_READ);
        
        return "new user made";

    }

    public function getPasswordhash($pw)
    {
        $password = Hash::make($pw);
        return Response::json($password);

    }
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function getAdd()
    {       
        return View::make('user/register')->with("companies", Company::all())->with("roles", Role::all())->with("submitText", Lang::get('messages.newUserButton'))->with("nameForm","addUserForm");
    }

    public function postAdd()
    {
        //if(Input::get('password') != "" && Input::get('passwordConfirm') != "")
        //{
        $username = Input::get('login');

        $validatorLogin = Validator::make(
            array(
                'username' => $username,
            ),
            array(
                'username' => 'required|username|unique:users',
            )
        );
        
        if($validatorLogin->fails())
        {
            App::abort(400);
        }
        else
        {
            $user = new User;
            $user->fullname = Input::get('fullname');
            $user->username = $username;
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->company_id = Input::get('companies');
            $user->remember_token = false; //Input::get('isActive')
            foreach (Role::all() as $role) {
                if(Input::get('role'.$role->id)) {
                    $user->makeRole($role->code);
                }
            }
            $user->save();                             
        }
    }

    public function getEdit($id)
    {
        return View::make('user/register')->with('user',User::findOrFail($id))->with("companies", Company::all())->with("roles", Role::all())->with("submitText", Lang::get('messages.editUserButton'))->with("nameForm","editUserForm");
    }
    
    public function postEdit()
    {
        echo Input::get('id');
        $user = User::findOrFail(Input::get('id'));
        $user->fullname = Input::get('fullname');
        $user->username = Input::get('login');
        $user->email = Input::get('email');
        
        if(Input::get('password') != "")
            $user->password = Hash::make(Input::get('password'));
        
        $user->company_id = Input::get('companies');
        $user->remember_token = false; //Input::get('isActive')
        foreach (Role::all() as $role) {
            if(Input::get('role'.$role->id)) {
                $user->makeRole($role->code);
            }
            else{
                
            }
        }
        $user->save(); 
    }
}
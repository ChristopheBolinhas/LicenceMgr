<?php

class AuthController extends BaseController {

    /*
    public function getLogin()
    {
        return View::make('login');    
    }
    */
    public function anyList() {   
        if(Auth::user()->IsSuperAdmin())
        {
            return View::make("user/list")->with("users", User::all());
        }
        else if(Auth::user()->IsAdmin())
        {
            
            return View::make("user/list")->with("users", User::where('company_id','=', Auth::user()->company_id)->get());
        }
    }

    public function postLogin()
    {    
        $user = array(
            'username' => Input::get('name'),
            'password' => Input::get('password')
        );
        
        $remember = Input::get('souvenir');
        
        if(Auth::attempt($user,$remember))
        {
            return Redirect::to('/');
        }
        else
        {
            return Redirect::to('/')->with('error', 'Les informations d\'identification ne sont pas corrects !')->withInput();    
        }
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
        if(Auth::user()->IsAdmin() || Auth::user()->IsSuperAdmin())
        {
            return View::make('user/register')
                ->with("companies", Company::all())
                ->with("roles", Role::all())
                ->with("submitText", Lang::get('controls.newUserButton'))
                ->with("nameForm","addUserForm");
        }
    }

    public function postAdd()
    {
        if(Auth::user()->IsSuperAdmin() || Auth::user()->IsAdmin())
        {
            $username = Input::get('login');

            $validatorLogin = Validator::make(
                array(
                    'username' => $username,
                ),
                array(
                    'username' => 'required|unique:users,username',
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
                $user->save();                             
                foreach (Role::all() as $role) {
                    if(Input::get('role'.$role->id)) {
                        $user->makeRole($role->code);
                    }
                }
                $user->save();
            }
        }
    }

    public function getEdit($id)
    {
        if(Auth::user()->IsSuperAdmin())
        {
            return View::make('user/register')
                ->with('user',User::findOrFail($id))
                ->with("companies", Company::all())
                ->with("roles", Role::all())
                ->with("submitText", Lang::get('controls.editUserButton'))
                ->with("nameForm","editUserForm");
        }
        else if(Auth::user()->IsAdmin())
        {
            return View::make('user/register')
                ->with('user',User::findOrFail($id))
                ->with("roles", Role::all())
                ->with("submitText", Lang::get('controls.editUserButton'))
                ->with("nameForm","editUserForm");
        }
    }

    public function postEdit()
    {
        if(Auth::user()->IsSuperAdmin() || Auth::user()->IsAdmin())
        {
            $user = User::findOrFail(Input::get('id'));
            $user->fullname = Input::get('fullname');
            $user->username = Input::get('login');
            $user->email = Input::get('email');

            if(Input::get('password') != "")
                $user->password = Hash::make(Input::get('password'));

            $user->company_id = Input::get('companies');
            
            $listeRoles = array();
            foreach (Role::all() as $role) {
                if(Input::get('role'.$role->id)) {
                    $listeRoles[] = $role->code;
                }
            }
            
            $user->setRoles($listeRoles);
        }
    }
    
    public function deleteDelete($id) {
        if(Auth::user()->IsSuperAdmin())
        {
            User::destroy($id);
        }
        else if(Auth::user()->isAdmin())
        {
            $user = User::findOrFail($id);
            if(!$user->isSuperAdmin())
            {
                User::destroy($id);
            }
            else
            {    
                App::abort(400);   
            }
        }
    }
    
    public function getParam()
    {
        return View::make('user/parameter')
                ->with('user', Auth::user());
    }
    
    public function postParam()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $user->fullname = Input::get('fullname');
            $user->email = Input::get('email');
            
            if(Input::get('password') != "")
                $user->password = Hash::make(Input::get('password'));
            
            $user->save();
        }
    }
}
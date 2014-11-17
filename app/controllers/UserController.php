<?php

class UserController extends BaseController {

  public function showLogin()
    {
      return View::make("login");
    }
  public function getLogin()
    {
        //$editor = Editor::all(); 
           
        return View::make('user/login');//->with('editorList_public',$editor); 
    }
   public function getAdd()
    {
        //$editor = Editor::all(); 
           
        return View::make('user/register');//->with('editorList_public',$editor); 
    }
}
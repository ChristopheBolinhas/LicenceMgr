<?php

class UserController extends BaseController {

  public function showLogin()
    {
      return View::make("login");
    }
  
}
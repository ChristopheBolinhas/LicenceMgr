<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    //Indique les champs à remplir 
    protected $guarded = array('id');
    
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    public function roles() {
        return $this->belongsToMany('Role');
    }

    /**
     * Check if user is in role
     * @param $roleCode Constant in Role model
     * @return bool
     */
    public function IsInRole($roleCode) {
        // TODO
    }
}

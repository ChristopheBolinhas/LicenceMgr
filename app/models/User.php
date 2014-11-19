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
    public function hasRole($roleCode)
    {
        return in_array($check, array_fetch($this->roles->toArray(), 'name'));
    }
    
     /**
     * Get key in array with corresponding value
     *
     * @return int
     */
    private function getIdInArray($array, $term)
    {
        foreach ($array as $key => $value) {
            if ($value == $term) {
                return $key;
            }
        }
 
        throw new UnexpectedValueException;
    }
 
    
     public function addRole($role) {
        $rolesList = array_fetch(Role::all()->toArray(), 'name');
        $assigned_role = $this->getIdInArray($rolesList, $role);
        $this->roles()->attach($assigned_role);
    }
    public function removeRole($role){
        $rolesList = array_fetch(Role::all()->toArray(),'name');
        $removed_role = $this->getIdInArray($rolesList, $role);
        
        
    }
}

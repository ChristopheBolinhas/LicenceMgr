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

    public function company() {
        return $this->belongsTo('Company');
    }
    
    public function companyName(){
        return Company::find($this->company_id)->name;
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
    //Fonction à tester par toi Pierre
    public function setRoles($roleList)
    {
        foreach(Role::all() as $role)
        {
            echo "on entre";
            //Si l'utilisateur à le role ET qu'il n'est pas dans la liste d'édition
            if($this->IsInRole($role->code) && !in_array($role->code, $roleList))
                {
                echo "on supprime";
                //On supprime le rôle (vraiment à tester ici !)
                $this->roles()->detach($role);
            }
            //Si l'utilisateur n'a pas le rôle et qu'il est dans l'edition
            else if(in_array($role->code,$roleList) && !$this->IsInRole($role->code))
            {
                //On appele l'ajout de rôle
                $this->makeRole($role->code);
            }
        }
    }
    
    
    public function makeRole($roleCode){
        $role_id = Role::where('code', '=', $roleCode)->firstOrFail();
        $this->roles()->attach($role_id);
    }

    public function IsInRole($roleCode) {
        return $this->belongsToMany('Role')->where("code", "=", $roleCode)->count() > 0;
    }
    public function IsSuperAdmin() {
        return $this->IsInRole(Role::ROLE_SUPERADMIN);
    }
    public function IsAdmin() {
        return $this->IsInRole(Role::ROLE_ADMIN);
    }
    public function IsWrite() {
        return $this->IsInRole(Role::ROLE_WRITE);
    }
    public function IsRead() {
        return $this->IsInRole(Role::ROLE_READ);
    }
    public function IsReadOrWrite() {
        return $this->IsRead() || $this->IsWrite();

    }
}

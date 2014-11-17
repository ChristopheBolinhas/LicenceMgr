<?php
class Role extends Eloquent {
    public $timestamps = false;
    const ROLE_SUPERADMIN = "S";
    const ROLE_ADMIN = "A";
    const ROLE_WRITE = "W";
    const ROLE_READ = "R";

    public function users() {
        return $this->belongsToMany('User');
    }
}
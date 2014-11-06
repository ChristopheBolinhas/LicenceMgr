<?php

class Company extends Eloquent {
    public $timestamps = false;
    
    public function Programs() {
        return $this->hasMany('Program');
    } 
    
    public function Editors() {
        return $this->hasMany('Editor');
    } 
    
    public function Licences() {
        return $this->hasMany('Licence');
    } 
}
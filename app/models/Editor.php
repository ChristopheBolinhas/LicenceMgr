<?php

class Editor extends Eloquent {
    public $timestamps = false;
    
    public function Programs() {
        return $this->hasMany('Program')->orderBy('name', 'ASC');
    } 
    
    public function Company() {
        return $this->belongsTo("Company");
    }

}
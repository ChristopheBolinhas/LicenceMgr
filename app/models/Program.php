<?php

class Program extends Eloquent {
    public $timestamps = false;

    public function Parent() {
        return $this->belongsTo('Program', 'parent_id');
    }
    
    public function Editor() {
        return $this->belongsTo('Editor');
    }
    public function Licences() {
        return $this->hasMany('Licence');
    }
}
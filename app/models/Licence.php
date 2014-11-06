<?php

class Licence extends Eloquent {
    
    public function Program() {
        return $this->belongsTo('Program');
    }

    public function Company() {
        return $this->belongsTo("Company");
    }
    
    public function Sheets() {
        return $this->hasMany("Sheet");
    }
}

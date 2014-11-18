<?php

class Sheet extends Eloquent {
    public $timestamps = false;
    protected $table = 'files';

    protected $hidden = array('value');

    public function Licence() {
        return $this->belongsTo("Licence");
    }
}
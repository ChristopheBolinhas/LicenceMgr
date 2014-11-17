<?php

class Sheet extends Eloquent {
    public $timestamps = false;
    protected $table = 'files';

    public function Licence() {
        return $this->belongsTo("Licence");
    }
}
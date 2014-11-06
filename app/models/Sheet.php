<?php

class Sheet extends Eloquent {
    public $timestamps = false;
    protected $table = 'File';

    public function Licence() {
        return $this->belongsTo("Licence");
    }
}
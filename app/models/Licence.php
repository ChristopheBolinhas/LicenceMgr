<?php

class Licence extends Eloquent {
    
    public function Program() {
        return $this->belongsTo('Program');
    }


}

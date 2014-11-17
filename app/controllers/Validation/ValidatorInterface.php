<?php namespace Validation;
    
interface ValidatorInterface{
    
    public function fails($id = null);
    public function errors();
    
}    
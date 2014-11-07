<?php

class LicenceController extends BaseController {
    
    
    public function getList($idParent) {
        return View::make("Licence/List");
    }
    
}
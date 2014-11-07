<?php

class LicenceController extends BaseController {
    
    
    public function getList($idParent) {
        // TODO
        $licences = Licence::all();
        return View::make("Licence/List")->with('licences',$licences);
    }
    
}
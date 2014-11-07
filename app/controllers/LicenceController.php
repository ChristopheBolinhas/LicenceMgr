<?php

class LicenceController extends BaseController {
    
    
    public function getList($idParent) {
        // TODO
        $licences = Licence::all();
        return View::make("Licence/List")->with('licences',$licences);
    }
    public function getKey($id) {
        // TODO security
        return Response::json(array("AAAAA-BBBBB-CCCCC-DDDDD-EEEEE"));
    }
    
}
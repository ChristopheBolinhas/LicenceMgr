<?php

class LicenceController extends BaseController {
    
    
    public function anyList($idParent) {
        // TODO
        $licences = null;
        $values = explode("-", $idParent);        
        if ($values[0] === "program") {
            $licences = Program::find($values[1])->licences;
        }
        if ($licences === null) {
            $licences = array();
        }
        return View::make("Licence/List")->with('licences',$licences);
    }
    public function getKey($id) {
        $licence = Licence::find($id);
        
        // TODO security
        return Response::json(array($licence->value));
    }
    public function deleteDelete($id) {
        Licence::destroy($id);
    }
    
}
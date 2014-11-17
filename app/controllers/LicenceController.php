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
    public function getAdd($idParent) {
        return View::make("Licence/Add");
    }
    public function postAdd() {
        return Response::json(array(
            'name' => Input::get('name'),
            'value' => Input::get('value'),            
        ));
    }
    public function getEdit($id) {
        $licence = Licence::find($id);
        if ($licence == null) {
            App::abort(404);
            return;
        }
        return View::make("Licence/Edit")->with("licence", $licence);
    }
    public function postEdit() {
        $licence = Licence::find(Input::get('id'));
        if ($licence == null) {
            App::abort(404);
            return;
        }
        $licence->name = Input::get('name');
        $licence->value = Input::get('value');
        $licence->save();
    }
}
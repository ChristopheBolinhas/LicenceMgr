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
        return View::make("Licence/Add")->with('idParent', $idParent);
    }
    public function postAdd() {
        $ob = new Licence();
        $ob->program_id = Program::findOrFail(explode("-", Input::get('idParent'))[0]) ->id;
        // TODO chang ecompany id
        $ob->company_id = 1;
        // TODO user id
        $ob->creation_user_id = 0;
        $this->fill($ob);
    }
    public function getEdit($id) {
        $licence = Licence::findOrFail($id);
        return View::make("Licence/Edit")->with("licence", $licence);
    }
    public function postEdit() {
        $ob = Licence::findOrFail(Input::get('id'));
        $this->fill($ob);        
    }
    private function fill($ob) {
        $ob->name = Input::get('name');
        $ob->value = Input::get('value');
        // TODO user id
        $ob->last_update_user_id = 0;
        $ob->save();
    }
}
<?php

class LicenceController extends BaseController {
    
    
    public function anyList($idParent) {
        // TODO security
        $values = explode("-", $idParent);        
        if ($values[0] !== "program") {
            App::abort(404);
        }
        //$licences = Program::find($values[1])->licences;
        $licences = Licence::
              where("program_id", "=", $values[1])
            //->where("commpany_id", "=", 1)
            ->orderBy("name")
            ->get()
        ;   
        return View::make("licence/list")->with('licences',$licences);
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
        return View::make("licence/edit")
            ->with("licence", new Licence)
            ->with("title", "Ajouter une licence")
            ->with("action", "Ajouter")
            ->with("idParent", $idParent)
            ->with("cmd", "cmdAddLicence")
           ;
    }
    public function postAdd() {
        $ob = new Licence();
        $ob->program_id = Program::findOrFail(explode("-", Input::get('idParent'))[1])->id;
        // TODO chang ecompany id
        $ob->company_id = 1;
        // TODO user id
        $ob->creation_user_id = 0;
        $this->fill($ob);
    }
    public function getEdit($id) {
        $licence = Licence::findOrFail($id);

        return View::make("licence/edit")
            ->with("licence", $licence)
            ->with("title", "Modifier une licence")
            ->with("action", "Modifier")
            ->with("idParent", "")
            ->with("cmd", "cmdEditLicence")
           ;
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
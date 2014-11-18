<?php 
class CompanyController extends BaseController {
    
    public function getAdd() {
        return View::make("company/edit")
            ->with("company", new Company)
            ->with("title", "Nouvelle entreprise")
            ->with("action", "Ajouter")
            ->with("cmd", "cmdAddCompany")
           ;
    }
    public function postAdd() {
        $ob = new Company();
        $this->fill($ob);
    }
    public function getEdit($id) {
        return View::make("company/edit")
            ->with("company", Company::findOrFail($id))
            ->with("title", "Modifier l'entreprise")
            ->with("action", "Modifier")
            ->with("cmd", "cmdEditCompany")
           ;
    }
    public function postEdit() {
        $ob = Company::findOrFail(Input::get('id'));
        $this->fill($ob);
    }
    private function fill($ob) {
        $ob->name = Input::get('name');
        $ob->save();
    }
}
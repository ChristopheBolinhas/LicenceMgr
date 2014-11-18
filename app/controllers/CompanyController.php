<?php 
class CompanyController extends BaseController {
    
    public function getAdd() {
        return View::make("company/edit")
            ->with("company", new Company)
            ->with("title", Lang::get('messages.addCompanyModalTitle'))
            ->with("action", Lang::get('messages.addButton'))
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
            ->with("title", Lang::get('messages.modifyCompanyModalTitle'))
            ->with("action", Lang::get('messages.editButton'))
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
<?php 
class CompanyController extends BaseController {

    //Everything here must be limited to superadmin
    public function anyList() {        
        if(Auth::user()->IsSuperAdmin())
        {
            return View::make("company/list")->with("companies", Company::all());
        }
    }
    public function deleteDelete($id) {
        if(Auth::user()->IsSuperAdmin())
        {
            Company::destroy($id);
        }
    }
    public function getAdd() {
        if(Auth::user()->IsSuperAdmin())
        {
            return View::make("company/edit")
                ->with("company", new Company)
                ->with("title", Lang::get('messages.addCompanyModalTitle'))
                ->with("action", Lang::get('controls.addButton'))
                ->with("cmd", "cmdAddCompany")
                ;
        }
    }
    public function postAdd() {
        if(Auth::user()->IsSuperAdmin())
        {
            $ob = new Company();
            $this->fill($ob);
        }
    }
    public function getEdit($id) {
        if(Auth::user()->IsSuperAdmin())
        {
            return View::make("company/edit")
                ->with("company", Company::findOrFail($id))
                ->with("title", Lang::get('messages.modifyCompanyModalTitle'))
                ->with("action", Lang::get('controls.editButton'))
                ->with("cmd", "cmdEditCompany")
                ;
        }
    }
    public function postEdit() {
        if(Auth::user()->IsSuperAdmin())
        {
            $ob = Company::findOrFail(Input::get('id'));
            $this->fill($ob);
        }
    }
    private function fill($ob) {
        if(Auth::user()->IsSuperAdmin())
        {
            $ob->name = Input::get('name');
            $ob->save();
        }
    }

}
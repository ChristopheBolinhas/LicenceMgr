<?php

class LicenceController extends BaseController {


    public function anyList($idParent) {
        //Listing of the licences - available to Writer, Reader, Admin
        if(Auth::user()->IsReadOrWrite() || Auth::user()->IsAdmin())
        {
            $values = explode("-", $idParent);        
            if ($values[0] !== Program::NAME) {
                App::abort(404);
            }
            //$licences = Program::find($values[1])->licences;
            $licences = Licence::
                where("program_id", "=", $values[1])
                ->where("company_id", "=", Auth::user()->company_id)
                ->orderBy("name")
                ->get()
                ;   
            return View::make("licence/list")->with('licences',$licences);
        } else {
            App::abort(403);
        }
    }
    public function getKey($id) {
        if(Auth::user()->IsReadOrWrite() || Auth::user()->IsAdmin())
        {
            $licence = Licence::find($id);
            if ($licence->company_id == Auth::user()->company_id) {
                return Response::json(array($licence->value));
            }
        }
        App::abort(403);
    }
    public function deleteDelete($id) {
        if(Auth::user()->IsWrite() || Auth::user()->IsAdmin())
        {
            Licence::destroy($id);
        } else {
            App::abort(403);
        }
    }
    //Makes the edit licence modal appear to add a licence
    public function getAdd($idParent) {
        if(Auth::user()->IsWrite() || Auth::user()->IsAdmin())
        {
            return View::make("licence/edit")
                ->with("licence", new Licence)
                ->with("title", Lang::get('messages.addLicenceModalTitle'))
                ->with("action", Lang::get('controls.addButton'))
                ->with("idParent", $idParent)
                ->with("cmd", "cmdAddLicence")
                ;
        } else {
            App::abort(403);
        }
    }
    //Function to add a licence from the modal
    public function postAdd() {
        if(Auth::user()->IsWrite() || Auth::user()->IsAdmin())
        {
            $ob = new Licence();
            $values = explode("-", Input::get('idParent'));
            if ($values[0] !== Program::NAME) {
                App::abort(404);
            }
            $ob->program_id = Program::findOrFail($values[1])->id;
            $user = Auth::user();
            $ob->company_id = $user->company_id;
            $ob->created_user_id = $user->id;
            $this->fill($ob);
        } else {
            App::abort(403);
        }
    }
    //Makes the edit modal to modify a current licence
    public function getEdit($id) {
        if(Auth::user()->IsWrite() || Auth::user()->IsAdmin())
        {
            $licence = Licence::findOrFail($id);

            if ($licence->company_id != Auth::user()->company_id) {
                App::abort(403);
                return;
            }

            return View::make("licence/edit")
                ->with("licence", $licence)
                ->with("title", Lang::get('messages.modifyLicenceModalTitle'))
                ->with("action", Lang::get('controls.editButton'))
                ->with("idParent", "")
                ->with("cmd", "cmdEditLicence")
                ;
        } else {
            App::abort(403);
        }
    }
    public function postEdit() {
        if(Auth::user()->IsWrite() || Auth::user()->IsAdmin())
        {
            $ob = Licence::findOrFail(Input::get('id'));
            
            if ($ob->company_id != Auth::user()->company_id) {
                App::abort(403);
                return;
            }
            
            $this->fill($ob);        
        } else {
            App::abort(403);
        }
    }
    private function fill($ob) {
        if(Auth::user()->IsWrite() || Auth::user()->IsAdmin())
        {
            $ob->name = Input::get('name');
            $ob->value = Input::get('value');
            $ob->updated_user_id = Auth::user()->id;
            $ob->save();
        } else {
            App::abort(403);
        }
    }
}
<?php

class SheetController extends BaseController {
    public function anyList($idLicence) {
        $sheets = Sheet::where("licence_id", "=", $idLicence)->orderBy("name")->get();
        return View::make("sheet/list")->with("sheets", $sheets);
    }
    public function getGet($id) {
        return Response::download("/home/action/workspace/LicenceMgr/public/img/editor.png");
    }
    public function postEdit($id) {
        $sheet = Sheet::findOrFail($id);        
        switch (Input::get('key')) {
            case "name":
                $sheet->name = Input::get('value');
                break;
            default:
                App::abort(404);
        }
        $sheet->save();        
        return Response::json(true);
    }
    public function deleteDelete($id) {
        Sheet::destroy($id);
    }
}
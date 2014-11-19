<?php

class SheetController extends BaseController {
    public function anyList($idLicence) {
        $sheets = Sheet::where("licence_id", "=", $idLicence)->orderBy("name")->get();
        return View::make("sheet/list")->with("sheets", $sheets);
    }
    public function getGet($id) {
        return Response::download("/home/action/workspace/LicenceMgr/public/img/editor.png");
    }
}
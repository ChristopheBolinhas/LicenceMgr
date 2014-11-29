<?php

class SheetController extends BaseController {
    public function anyList($idLicence) {
        $sheets = Sheet::where("licence_id", "=", $idLicence)->orderBy("name")->get();
        return View::make("sheet/list")->with("sheets", $sheets)->with("licence_id", $idLicence);
    }
    public function getGet($id) {
        $sheet = Sheet::findOrFail($id);
        //return Response::download("/home/action/workspace/LicenceMgr/public/img/editor.png");
        return Response::make($sheet->value, 200, array('Content-type' => 'application/octet-stream', 'Content-Disposition' => 'attachment; filename="'.$sheet->name.'"'));
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
    public function postAdd($licenceId) {
        $files = Input::file('file');
        $results = array();
        foreach ($files as $file) {
            //var_dump($file);
            $sheet = new Sheet;
            $sheet->name = $file->getClientOriginalName();
            $filename = $file->getRealPath();
            $handle = fopen($filename, "rb");
            $contents = fread($handle, filesize($filename));
            fclose($handle);
            $sheet->value = $contents;
            $sheet->licence_id = $licenceId;
            $sheet->save();   
            $results[] = array("name" => $sheet->name, "id" => $sheet->id, "html" => View::make("sheet/row")->with("sheet", $sheet)->render());
        }
        return Response::json($results);
    }
}
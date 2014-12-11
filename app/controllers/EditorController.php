<?php 
class EditorController extends BaseController {

    public function getAdd()
    {
        if(Auth::user()->IsAdmin() || Auth::user()->IsWrite() || Auth::user()->IsSuperAdmin())
        {
            return View::make('editor/add');
        }
        return App::abort(404);
    }

    public function postAdd()
    {
        if(Auth::user()->IsAdmin() || Auth::user()->IsWrite())
        {
            $editor = new Editor;
            $editor->name = Input::get('name');
            if(Input::get('catalogue') == 1) 
            {
                $editor->company_id = Auth::user()->company_id;
            }

            $editor->save();
        }
    }

}
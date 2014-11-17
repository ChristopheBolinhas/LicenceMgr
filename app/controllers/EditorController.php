<?php 
class EditorController extends BaseController {
    
    public function getAdd()
    {
        //$editor = Editor::all(); 
           
        return View::make('editor/add');//->with('editorList_public',$editor); 
    }
    
    public function postAdd()
    {
        
        $editor = new Editor;
        $editor->name = Input::get('name');
        $editor->save();
        
    }
    
}
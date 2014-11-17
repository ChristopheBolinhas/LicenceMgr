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
        $editor->name = "Editor failed";
        if(Input::get('catalogue') == '0') //Catalogue public
        {
            $editor->name = Input::get('name') + " - public" ; 
        }
        else //Catalogue de l'entreprise
        {
            //TODO récupération du company_id de l'utilisateur actuel OU si pas de company_id -> public de toute façon
            $editor->company_id = 1;
            $editor->name = Input::get('name') + " - prive" ; 
            
        }
        
        $editor->save();
        
    }
    
}
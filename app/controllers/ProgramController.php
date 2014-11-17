<?php

class ProgramController extends BaseController {
    
    public function getAdd($type,$id)//$editor,$program)
    {
        if($type == 'editor')
            {
             $editor = Editor::findOrFail($id); 
             return View::make('program/add')->with('editorTitle',$editor->name); 
        }
        elseif($type == 'program')
            {
            $program = Program::findOrFail($id);
            
            
            return View::make('program/add');//->with('editorList_public',$editor); 
        }
        
       
           
        
    }
    public function getPrograms($editorId)
    {
        $programs = Program::where('editor_id','=',$editorId);
        //$programs = Program::all();
        
        return Response::json($programs);
    }
    
    public function postAdd()
        {
        
    }
    
}
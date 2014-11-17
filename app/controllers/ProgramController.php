<?php

class ProgramController extends BaseController {
    
    public function getAdd()
    {
        $editor = Editor::all(); 
           
        return View::make('program/add')->with('editorList_public',$editor); 
    }
    public function getPrograms($editorId)
    {
        $programs = Program::where('editor_id','=',$editorId);
        //$programs = Program::all();
        
        return Response::json($programs);
    }
    
}
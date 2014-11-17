<?php

class ProgramController extends BaseController {
    
    public function getAdd($type,$id)//$editor,$program)
    {
        if($type === Editor::NAME) {
             $editor = Editor::findOrFail($id); 
             return View::make('program/add')->with('editorTitle',$editor->name); 
        } elseif($type === Program::NAME) {
            $program = Program::findOrFail($id);
            return View::make('program/add')->with('editorTitle',$program->name); 
        }
        return View::abord(404);
    }
    public function getPrograms($editorId) {
        $programs = Program::where('editor_id','=',$editorId);
        //$programs = Program::all();
        
        return Response::json($programs);
    }
    
    public function postAdd() {
        
    }
    
}
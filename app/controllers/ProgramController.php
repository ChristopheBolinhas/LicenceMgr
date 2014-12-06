<?php

class ProgramController extends BaseController {


    //Function that retrives the content of the modal when adding a program to a selected editor/program in the tree
    public function getAdd($type,$id)
    {
        //All the user need to acces this is beeing writer, admin or superadmin
        if(Auth::user()->IsAdmin() || Auth::user()->IsWrite() || Auth::user()->IsSuperAdmin())
        {
            if($type === Editor::NAME) {
                $editor = Editor::findOrFail($id); 
                return View::make('program/add')->with('title',$editor->name)->with('editorId',$id); 
            } elseif($type === Program::NAME) {
                $program = Program::findOrFail($id);

                return View::make('program/add')->with('title',$program->name)->with('programId', $id);
            }
        }
        return View::abort(404);
    }


    public function postAdd() {
        //Determines who can add a program, writer - admin - superadmin
        if(Auth::user()->IsAdmin() || Auth::user()->IsWriter() || Auth::user()->IsSuperAdmin())
        {
            $program = new Program;
            $program->name = Input::get('name');
            if(Input::has('program_id'))
            {
                $program->parent_id = Input::get('program_id');

                $program->save();
            }
            elseif(Input::has('editor_id'))
            {
                $program->editor_id = Input::get('editor_id');
                $program->save();
            }
        }


    }

}
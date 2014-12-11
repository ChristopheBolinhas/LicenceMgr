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
                if($editor->company_id != null)
                {
                    return View::make('program/add')
                        ->with('title',$editor->name)
                        ->with('editorId',$id)
                        ->with('isPrivate',true); 
                }
                else
                {
                    return View::make('program/add')
                        ->with('title',$editor->name)
                        ->with('editorId',$id)
                        ->with('isPrivate',false); 
                }

            } elseif($type === Program::NAME) {
                $program = Program::findOrFail($id);
                if($program->company_id != null){
                    return View::make('program/add')
                        ->with('title',$program->name)
                        ->with('programId', $id)
                        ->with('isPrivate',true);
                }
                else{
                    return View::make('program/add')
                        ->with('title',$program->name)
                        ->with('programId', $id)
                        ->with('isPrivate',false);
                }
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
            
            //Test to know if private or public
            if(Input::has('catalogue')){
                //Si l'utilisateur le demande en privé
                if(Input::get('catalogue') == 1){
                    $program->company_id = Auth::user()->company_id;
                }
            }
            else
                {
                    $program->company_id = Auth::user()->company_id;
            }
            
            if(Input::has('program_id'))
            {
                $program->parent_id = Input::get('program_id');
                $parent_program = Program::findOrFail($program->parent_id);
                if($parent_program->company_id == Auth::user()->company_id || $parent_program->company_id === null)
                    $program->save();
            }
            elseif(Input::has('editor_id'))
            {
                $program->editor_id = Input::get('editor_id');
                
                $parent_editor = Editor::findOrFail($program->editor_id);
                if($parent_editor->company_id == Auth::user()->company_id || $parent_editor->company_id === null)
                    $program->save();
            }
        }


    }

}
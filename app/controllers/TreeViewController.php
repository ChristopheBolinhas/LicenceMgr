<?php

class TreeViewController extends BaseController {
    /*
    public function anyIndex() {
        return View::make('TreeView/index');
    }*/
    public function getTree2($id) {
        return Response::json(array($id));
    }
    public function getTree() {
        $editors = Editor::all();
        $result = [];
        foreach ($editors as $editor) {
            $childrens = [];
            foreach ($editor->programs as $program) {
                $childrens[] = $this->programToArray($program);
            }
            
            $result[] = array(
                'id' => "editor-".$editor->id,
                'text' =>  $editor->name,
                'children' => $childrens 
            );
        }
        
        return Response::json($result);
    }
    private function programToArray($program) {
        $childrens = [];
        
        foreach ($program->childrens as $children) {
            $childrens[] = $this->programToArray($children);
        }
        
        return array(
            'id' => "program-".$program->id,
            'text' =>  $program->name,
            'children' => $childrens 
        );
    }
}
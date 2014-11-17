<?php

class TreeViewController extends BaseController {

    public function getTree($all) {
        // TODO créer fonction isbool
        $all = $all === "true";
        // TODO filter sur entreprise
        $companyId = 1;
        if ($all) {
            $editors = Editor::
                whereNull("company_id")
                ->orWhere("company_id", "=", $companyId)
            ;
        } else {
            $editors = Editor::where("company_id", "=", $companyId);
        }

        $editors = $editors->orderBy('name', 'ASC')->get();

        $result = [];
        foreach ($editors as $editor) {
            $result[] = $this->editorToArray($editor);
        }
        
        return Response::json($result);
    }
    private function editorToArray($editor) {
        $childrens = [];

        foreach ($editor->programs as $program) {
            $childrens[] = $this->programToArray($program);
        }

        return array(
            'id' => Editor::NAME."-".$editor->id,
            'text' =>  $editor->name,
            'children' => $childrens ,
            'icon' => '/img/editor.png'
        );
    }
    private function programToArray($program) {
        $childrens = [];
        
        foreach ($program->childrens as $children) {
            $childrens[] = $this->programToArray($children);
        }
        
        return array(
            'id' => Program::NAME."-".$program->id,
            'text' =>  $program->name,
            'children' => $childrens ,
            'icon' => '/img/program.png'
        );
    }
}
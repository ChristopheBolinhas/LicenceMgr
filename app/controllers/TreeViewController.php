<?php

class TreeViewController extends BaseController {

    public function getTree($all) {
        // TODO créer fonction isbool
        $all = $all === "true";
        // TODO filter sur entreprise
        $companyId = 1;
        $result = [];
        if ($all) {
            $editors = Editor::
                whereNull("company_id")
                ->orWhere("company_id", "=", $companyId)
                ->orderBy('name')
                ->get();
            ;
            foreach ($editors as $editor) {
                $result[] = $this->editorToArray($editor);
            }
        } else {
            // génération du tree en plusieurs étapes
            // 1 : récupération des programmes ayant une licence dans l'entreprise
            $programsId = Licence::where("company_id", "=", $companyId)->select(array("program_id"))->distinct()->lists("program_id");
            $programs = Program::whereIn("id", $programsId)->orderBy("parent_id")->get();

            /*
              2 :
                2.1 : Récupération de tous les parents des programme
                2.2 : création d'un arbre avec comme clé l'id du programme, et comme valeur le programme ("modal")
                      et un tableau des id de ses enfants ("children"). Cette liste est remplie à l'étape 3.1

              A cause de l'ajout dans le tableau pour l'étape 2.1, on utilise un for au lieux d'un foreach, car le for
              reprend dynamiquement la taille du tableau
            */
            $treeProgram = [];
            for($i = 0 ; $i < count($programs) ; $i++) {
                $program = $programs[$i];
                // controle du parent si dans la liste des id
                if (!is_null($program->parent_id) && !in_array($program->parent_id, $programsId)) {
                    $programsId[] = $program->parent_id;
                    $programs[] = $program->Parent;
                }
                // ajout dans l'arbre
                $treeProgram[$program->id] =array("model" => $program, "children" => array());
            }
            /*
              3 :
                3.1 : Remplissage des tableaux des enfants pour chaque programme
                3.2 : Création de l'arbre des editeurs avec le même principe que pour les programmes.
            */
            $treeEditors = [];
            foreach ($programs as $program) {
                // si existant, ajout dans les enfants
                if (!is_null($program->parent_id)) {
                    $treeProgram[$program->parent_id]["children"][] = $program->id;
                }
                // si le programme à un éditeur
                if (!is_null($program->editor_id)){
                    // si l'editeur existe, on lui ajoute un enfant
                    if (array_key_exists($program->editor_id, $treeEditors)) {
                        $treeEditors[$program->editor_id]["children"][] = $program->id;
                    } else {
                        // sinon on le récupère dans la db, on le cré, et on ajoute un enfant
                        $treeEditors[$program->editor_id] =array("model" => $program->editor, "children" => array($program->id));
                    }
                }
            }
            // 4 : Tri des éditeurs selon leurs nom
            usort($treeEditors, function($a, $b) {
                return strnatcmp($a['model']->name, $b['model']->name);
            });
            // 5 : convertion arbre -> json
            foreach ($treeEditors as $editor) {
                $arrayEditor = $this->editorToArray($editor["model"], true);
                foreach($editor["children"] as $idProgram) {
                    $arrayEditor["children"][] = $this->programToArray($treeProgram[$idProgram]["model"], $treeProgram);
                    usort($arrayEditor["children"], function($a, $b) {
                        return strnatcmp($a['text'], $b['text']);
                    });
                }
                $result[] = $arrayEditor;
            }
        }
        return Response::json($result);
    }
    private function editorToArray($editor, $skipChildrens = false) {
        $childrens = [];

        if (!$skipChildrens) {
            foreach ($editor->programs as $program) {
                $childrens[] = $this->programToArray($program);
            }
        }

        return array(
            'id' => Editor::NAME."-".$editor->id,
            'text' =>  $editor->name,
            'children' => $childrens ,
            'icon' => '/img/editor.png'
        );
    }
    private function programToArray($program, $tree = false) {
        $childrens = [];
        if ($tree) {
            foreach ($tree[$program->id]["children"] as $children) {
                $childrens[] = $this->programToArray($tree[$children]["model"], $tree);
            }
            usort($childrens, function($a, $b) {
                return strnatcmp($a['text'], $b['text']);
            });
        } else {
            foreach ($program->childrens as $children) {
                $childrens[] = $this->programToArray($children);
            }
        }

        return array(
            'id' => Program::NAME."-".$program->id,
            'text' =>  $program->name,
            'children' => $childrens ,
            'icon' => '/img/program.png'
        );
    }
}
<?php
/**
@description Basic core functions + db support.Idea was to keep it very very simple
@date 13 August 2016
@author Gerome Guilfoyle
*/
class Core {
    public function loadModel($cModelname) {
        require_once("models/{$cModelname}.php");
        $cClassname = $cModelname."_Model()";
        $this->{$cModelname} = new $cClassname;
    }
    public function connecttodb() { //Simply setup your settings here then use normal php pdo
        
    }
}
?>

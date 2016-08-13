<?php
/**
@description Basic core functions + db support.Idea was to keep it very very simple
@date 13 August 2016
@author Gerome Guilfoyle
*/

class Core extends Logger {
    public function loadModel($cModelname) {
        require_once("models/{$cModelname}.php");
        $cClassname = $cModelname."_Model()";
        $this->{$cModelname} = new $cClassname;
    }
    public function connecttodb() { //Simply setup your settings here then use normal php pdo

    }
    public function render($aData = array(), $cRenderformat = "json") {
        if($cRenderformat == "json") {
            echo json_encode($aData);
        } else if($cRenderformat == "xml") {
            #TODO Implement a xml output
        } else {
            $this->log("Unsupported render format specificed", FAIL);
        }
    }
}
?>

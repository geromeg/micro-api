<?php
class BasicOrm extends Core {
    //Just a class that implements basic constructs so that you don't have to keep defining them.
    //This is only restricted to sql however
    public function __construct() {
        $cChildClassname = get_class($this);
        $this->cTablename = strtolower(substr($cChildClassName,0,strpos($cChildClassname, "_")));
        //Do a primary key lookup

    }
    public function getall() {
        $cSql = "SELECT * FROM {$this->cTablename}";

    }
    public function remove() {

    }
    public function get($nId = 0) {

    }
    public function update($nId = 0) {

    }
    public function create() {

    }
}
?>

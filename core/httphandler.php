<?php
/**
@description
    handle all the various http/https requests
@date 13 August 2016
@author Gerome Guilfoyle
*/

print_r($_SERVER);
require_once("logger.php");


class HttpHandler {

    private $cRequesttype;
    private $cRoute;
    private $cRemoteip;
    private $cOrigin;
    private $cContenttype;

    //External objects
    private $oLogger;

    public function __construct() {
        $this->cRequesttype = $_SERVER['REQUEST_METHOD'];
        $this->cRoute = $_GET['params'];
        $this->cRemoteip = $_SERVER['REMOTE_ADDR'];
        $this->cOrigin = $_SERVER['HTTP_ORIGIN'];
        $this->cContenttype = $_SERVER['CONTENT_TYPE'];
        $this->cAllowedContenttype = "application/json"; //Default to json, most folks will be using this
        $this->cAllowedOrigin = "*"; //Default to all
        $this->cRequestbody = file_get_contents("php://input"); //Read request body buffer
        $this->oLogger = new Logger();
    }
    public function setAllowedContentType($cContenttype = "application/json") { //Default to json
        $this->cAllowedContenttype = $cContenttype;
    }


    public function evaluate($cRequesttype = "", $cRoute = "") {
        //Check content type
        if($this->cContenttype != $this->cAllowedContenttype) {
            $aError = array(
                "error" => "The content type you used was not authorized you used {$this->cContenttype}"
            );
            $this->oLogger->log(json_encode($aError),BROWSER);
            return;
        }
        //Check the origin which the data is coming from
        if($this->cAllowedOrigin != "*" && $this->cAllowedOrigin!=$cOrigin) {
            $aError = array(
                "error" => "The origin you used was not authorized you used {$this->cOrigin}"
            );
            $this->oLogger->log(json_encode($aError),BROWSER);
            return;
        }
        //We passed some of the tests so lets evaluate the route and request type
        if($this->cRequesttype == $cRequesttype && $this->cRoute == $cRoute) {
            return true; //Let this pass
        } else {
            return false; //Evaluate next route
        }
    }

    public function getRequestBody() {
        return $this->cRequestbody;
    }

    public function convertRequestBodyToJsonObject() {
        return json_decode($this->cRequestbody);
    }

}

?>

<?php
/**
@description
    This framework is meant to be a catch all frame work which allows you to do all your api
    work from one centralised location.
    Below you will setup your routes and then be able to use your own style of php to implement
    any functionality required.
@date 13 August 2016
@author Gerome Guilfoyle
*/
require_once("core/bootloader.php");
require_once("core/httphandler.php");

$oHttphandler = new HTTPHandler();
$oCore = new Core(); //Allows us to load models and other things


if($oHttphandler->evaluate("GET", "/user/:id")) { //Build your code here
    $oCore->loadModel("user");
    $oUser = $oHttphandler->convertRequestBodyToJson();
    $oCore->render($oCore->user->get($oUser->id),"json");
}

?>

<?php
/**
@description
    Just a basic logger class to do various types of logging / errors
@date 13 August 2016
@author Gerome Guilfoyle
*/
define("BROWSER",1);
define("FAIL",2);
define("LOGTOFILE",3);

class Logger {
    public function __construct() {}
    public function log($cMessage, $cLogtype = LOGTOFILE ) {
        $cPrepend = date("[Y-m-d H:i:s] ");
        $cMessage = $cPrepend.$cMessage;
        switch($cLogtype) {
            case BROWSER:
                echo $cMessage."<br />";
            break;
            case FAIL:
                throw new Exception($cMessage);
            break;
            case LOGTOFILE:
                file_put_contents("/tmp/micro-api.log", $cMessage);
            break;
        }
    }

}
?>

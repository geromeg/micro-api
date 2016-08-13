<?php
/**
@description
    An example of how to implement a basic user model using the framework
@date 13 August 2016
@author Gerome Guilfoyle
*/
class User_Model extends BasicOrm { //getall etc will already be implemented by the parent however I will illustrate a custom method
    public function getAllUsersAndTypesByUserid($nId = 0) {
        $cSql = "SELECT * FROM users LEFT JOIN usertypes ON(users.usertypeid = usertypes.id) WHERE users.id = :id";
        $rStatement = $this->prepare($cSql);
        $rStatement->bindValue(":id",$nId);
        $rStatement->execute();

        while($this->fetchObject($rStatement)) $aRows[] = $aRow;

        return $aRows;

    }
}
?>

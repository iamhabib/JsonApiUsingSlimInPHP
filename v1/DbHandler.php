<?php

/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 *
 * @author Habibur Rahman
 * @link URL iamhabib.com
 */

class DbHandler {

    private $conn;

    function __construct() {
        require_once '../include/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    function isValidHeader($api_key){
        return true;
    }

    function methodMethodName($parramName){
        return $parramName;
    }

}

?>

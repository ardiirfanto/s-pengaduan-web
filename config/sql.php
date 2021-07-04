<?php 

include "conn.php";

class Sql {

    var $sql;

    function __construct()
    {   
        $this->sql = new Database();
    }

    public function query($query)
    {
        $q = $this->sql->Connection()->query($query);
        return $q;
    }

}
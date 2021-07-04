<?php

include_once("../config/sql.php");

class Post {
    
    public $sql;

    function __construct()
    {
        $this->sql = new Sql();
    }

    function view_post()
    {


        try {
            $get = $this->sql->query("SELECT * FROM post")->fetch_all(MYSQLI_ASSOC);

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

    function get_post($id)
    {
        try {
            $get = $this->sql->query("SELECT * FROM post WHERE post_id ='$id'")->fetch_assoc();

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

}
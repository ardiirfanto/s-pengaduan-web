<?php

include_once("../config/sql.php");

class Pengaduan {
    
    public $sql;

    function __construct()
    {
        $this->sql = new Sql();
    }

    function view()
    {


        try {
            $get = $this->sql->query("SELECT * FROM pengaduan a 
            JOIN warga b ON a.warga_id = b.warga_id 
            JOIN category_pengaduan c ON a.category_pengaduan_id = c.category_pengaduan_id 
            ORDER BY a.pengaduan_id DESC")->fetch_all(MYSQLI_ASSOC);

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

    function get($id)
    {
        try {
            $get = $this->sql->query("SELECT * FROM pengaduan a 
            JOIN warga b ON a.warga_id = b.warga_id 
            JOIN category_pengaduan c ON a.category_pengaduan_id = c.category_pengaduan_id 
            WHERE a.pengaduan_id ='$id'")->fetch_assoc();

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

}
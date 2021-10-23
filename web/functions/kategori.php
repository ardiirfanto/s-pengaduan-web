<?php

include_once("../config/sql.php");

class Category {
    
    public $sql;

    function __construct()
    {
        $this->sql = new Sql();
    }

    function view_cat_pengaduan()
    {


        try {
            $get = $this->sql->query("SELECT * FROM kategori_pengaduan")->fetch_all(MYSQLI_ASSOC);

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

    function get_cat_pengaduan($id)
    {
        try {
            $get = $this->sql->query("SELECT * FROM kategori_pengaduan WHERE category_pengaduan_id ='$id'")->fetch_assoc();

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }
    function view_cat_post()
    {


        try {
            $get = $this->sql->query("SELECT * FROM kategori_berita")->fetch_all(MYSQLI_ASSOC);

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

    function get_cat_post($id)
    {
        try {
            $get = $this->sql->query("SELECT * FROM kategori_berita WHERE category_post_id ='$id'")->fetch_assoc();

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

}
<?php

include_once("../config/sql.php");

class User
{   

    public $sql;

    function __construct()
    {
        $this->sql = new Sql();
    }

    function view_warga()
    {


        try {
            $get = $this->sql->query("SELECT * FROM pengguna a JOIN warga b ON a.user_id = b.user_id WHERE a.role='warga'")->fetch_all(MYSQLI_ASSOC);

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

    function get_warga($id)
    {
        try {
            $get = $this->sql->query("SELECT * FROM users a JOIN warga b ON a.user_id = b.user_id WHERE a.user_id='$id'")->fetch_assoc();

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

    function view_kades()
    {

        try {
            $get = $this->sql->query("SELECT * FROM pengguna a JOIN kades b ON a.user_id = b.user_id WHERE a.role='kades'")->fetch_all(MYSQLI_ASSOC);

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

    function get_kades($id)
    {


        try {
            $get = $this->sql->query("SELECT * FROM pengguna a JOIN kades b ON a.user_id = b.user_id WHERE a.user_id='$id'")->fetch_assoc();

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

    function get_user($id)
    {


        try {
            $get = $this->sql->query("SELECT * FROM pengguna WHERE user_id='$id'")->fetch_assoc();

            if ($get['role'] == 'kades') {
                $row = $this->get_kades($get['user_id']);
                $data = [
                    "user_id" => $row['user_id'],
                    "username" => $row['username'],
                    "name" => $row['kades_name'],
                    "gender" => $row['kades_gender'],
                    "alamat" => $row['kades_alamat']
                ];
            } else {
                $row = $this->get_warga($get['user_id']);
                $data = [
                    "user_id" => $row['user_id'],
                    "username" => $row['username'],
                    "name" => $row['warga_name'],
                    "gender" => $row['warga_gender'],
                    "alamat" => $row['warga_alamat'],
                    "phone" => $row['warga_phone']
                ];
            }


            return $data;
        } catch (Exception $e) {
            return $e;
        }
    }
}

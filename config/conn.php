<?php 

include_once("app.php");

define('HOST', $app['host']);
define('USER', $app['username']);
define('PASS', $app['password']);
define('DB', $app['database']);

class Database
{

    var $host;
    var $username;
    var $password;
    var $database;

    function __construct()
    {
        $this->host = HOST;
        $this->username = USER;
        $this->password = PASS;
        $this->database = DB;
    }

    function Connection()
    {
        $getConnection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            return "Koneksi database gagal : " . mysqli_connect_error();
        } else {
            return $getConnection;
        }
    }
}
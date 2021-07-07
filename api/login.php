
<?php

include "../config/sql.php";
include "json_response.php";

$sql = new Sql();
$json = new JSONResponse();

$username = $_POST['username'];
$password = $_POST['password'];

try {

    $get = $sql->query("SELECT * FROM users WHERE username = '$username'")->fetch_assoc();

    if ($get) {

        if (password_verify($password, $get['password'])) {
            $get_data = $sql->query(
                "SELECT a.*, b.warga_name, b.warga_gender, b.warga_alamat, b.warga_phone 
                FROM users a JOIN warga b ON a.user_id = b.user_id 
                WHERE a.user_id = '$get[user_id]'"
            )->fetch_assoc();
            
            echo $json->success($get_data);
        } else {
            echo $json->failed(1);
        }
    } else {
        echo $json->failed(0);
    }

} catch (Exception $e) {
    echo $json->failed(2);
}

?>
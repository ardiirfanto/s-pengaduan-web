
<?php

include "../config/sql.php";
include "json_response.php";

$sql = new Sql();
$json = new JSONResponse();

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$name = $_POST['name'];
$gender = $_POST['gender'];
$alamat = $_POST['alamat'];
$phone = $_POST['phone'];
$role = "warga";

try {

    $q_user = $sql->query(
        "INSERT INTO users(username,password,role) VALUES('$username','$password','warga')"
    );

    if ($q_user) {

        $get_user = $sql->query("SELECT * FROM users WHERE role='$role' ORDER BY user_id DESC LIMIT 1")->fetch_assoc();

        $user_id = $get_user['user_id'];

        $q_data = $sql->query(
            "INSERT INTO warga(user_id,warga_name,warga_gender,warga_alamat,warga_phone) VALUES('$user_id','$name','$gender','$alamat','$phone')"
        );


        if ($q_data) {
            $get_data = $sql->query(
                "SELECT a.*, b.warga_name, b.warga_gender, b.warga_alamat, b.warga_phone 
                FROM users a JOIN warga b ON a.user_id = b.user_id 
                WHERE a.user_id = '$get_user[user_id]'"
            )->fetch_assoc();

            echo $json->success($get_data);
        } else {
            echo $json->failed(0);
        }
    } else {
        echo $json->failed(0);
    }
} catch (Exception $e) {
    echo $json->failed(0);
}

?>
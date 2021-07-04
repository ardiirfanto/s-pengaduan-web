<?php

include "../../../config/sql.php";
$sql = new Sql();

$user_id = $_POST['user_id'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$name = $_POST['name'];
$role = $_POST['role'];
$gender = $_POST['gender'];
$alamat = $_POST['alamat'];
$phone = $_POST['phone'] ?? '';
try {

    if ($_POST['password'] != '') {
        $q_user = $sql->query(
            "UPDATE users SET username ='$username', password='$password' WHERE user_id='$user_id'"
        );
    } else {
        $q_user = $sql->query(
            "UPDATE users SET username ='$username' WHERE user_id='$user_id'"
        );
    }


    if ($q_user) {

        if ($role == 'warga') {
            $q_data = $sql->query(
                "UPDATE warga SET warga_name='$name',warga_gender='$gender', warga_alamat='$alamat', warga_phone='$phone' WHERE user_id='$user_id'"
            );
        } else {
            $q_data = $sql->query(
                "UPDATE kades SET kades_name='$name',kades_gender='$gender', kades_alamat='$alamat' WHERE user_id='$user_id'"
            );
        }

        if ($q_data) {
            echo 1;
        } else {
            echo 2;
        }
    } else {
        echo 0;
    }
} catch (Exception $e) {
    echo $e;
}

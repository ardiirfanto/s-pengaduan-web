<?php

include "../../../config/sql.php";
$sql = new Sql();

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$name = $_POST['name'];
$role = $_POST['role'];
$gender = $_POST['gender'];
$alamat = $_POST['alamat'];
$phone = $_POST['phone'] ?? '';
try {

    $q_user = $sql->query(
        "INSERT INTO pengguna(username,password,role) VALUES('$username','$password','$role')"
    );

    if ($q_user) {

        $get_user = $sql->query("SELECT * FROM pengguna WHERE role='$role' ORDER BY user_id DESC LIMIT 1")->fetch_assoc();

        $user_id = $get_user['user_id'];
        $user_role = $get_user['role'];

        if ($user_role == 'kades') {
            $q_data = $sql->query(
                "INSERT INTO kades(user_id,kades_name,kades_gender,kades_alamat) VALUES('$user_id','$name','$gender','$alamat')"
            );
        } else {
            $q_data = $sql->query(
                "INSERT INTO warga(user_id,warga_name,warga_gender,warga_alamat,warga_phone) VALUES('$user_id','$name','$gender','$alamat','$phone')"
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

<?php

session_start();
include "../../../config/sql.php";
$sql = new Sql();

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $get = $sql->query("SELECT * FROM users WHERE username = '$username'")->fetch_assoc();

    if ($get) {

        if (password_verify($password, $get['password'])) {

            $_SESSION['token'] = hash('sha512',date('YmdHis'));
            $_SESSION['user_id'] = $get['user_id'];
            $_SESSION['username'] = $get['username'];
            $_SESSION['role'] = $get['role'];

            if ($get['role'] != 'admin') {
                $role = $get['role'];
                $get_data = $sql->query("SELECT * FROM $role WHERE user_id='$get[user_id]'")->fetch_assoc();

                $_SESSION['id'] = $get_data[$role . '_name'];
                $_SESSION['name'] = $get_data[$role . '_name'];
            }

            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 2;
    }
} catch (Exception $e) {
    echo $e;
}

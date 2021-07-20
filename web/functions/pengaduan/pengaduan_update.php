<?php

include "../../../config/sql.php";
$sql = new Sql();

$id = $_POST['id'];
$status = $_POST['status'];

try {

    $q_update = $sql->query(
        "UPDATE pengaduan SET pengaduan_status='$status' WHERE pengaduan_id='$id'"
    );

    if ($q_update) {
        echo 1;
    } else {
        echo 0;
    }

} catch (Exception $e) {
    echo $e;
}
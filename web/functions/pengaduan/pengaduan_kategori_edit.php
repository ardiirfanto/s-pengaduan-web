<?php

include "../../../config/sql.php";
$sql = new Sql();

$cat_id = $_POST['cat_id'];
$cat = $_POST['cat'];

try {

    $q = $sql->query(
        "UPDATE category_pengaduan SET category_pengaduan='$cat' WHERE category_pengaduan_id='$cat_id'"
    );

    if ($q) {
        echo 1;
    } else {
        echo 0;
    }
} catch (Exception $e) {
    echo $e;
}


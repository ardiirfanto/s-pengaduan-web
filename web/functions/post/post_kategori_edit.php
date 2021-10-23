<?php

include "../../../config/sql.php";
$sql = new Sql();

$cat_id = $_POST['cat_id'];
$cat = $_POST['cat'];
try {

    $q = $sql->query(
        "UPDATE kategori_berita SET category_post='$cat' WHERE category_post_id='$cat_id'"
    );

    if ($q) {
        echo 1;
    } else {
        echo 0;
    }
} catch (Exception $e) {
    echo $e;
}


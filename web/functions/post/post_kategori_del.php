<?php

include "../../../config/sql.php";
$sql = new Sql();
try {

    $q_del = $sql->query(
        "DELETE FROM kategori_berita WHERE category_post_id='$_POST[cat_id]'"
    );

    if ($q_del) {
        echo 1;
    } else {
        echo 0;
    }

} catch (Exception $e) {
    echo $e;
}
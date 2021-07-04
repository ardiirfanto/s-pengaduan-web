<?php

include "../../../config/sql.php";
$sql = new Sql();

$location = "../../assets/doc/thumbnail/";
try {

    $getData = $sql->query("SELECT * FROM post WHERE post_id ='$_POST[post_id]'")->fetch_assoc();

    $file_available = glob($location . $getData['post_thumbnail']);
    foreach ($file_available as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }

    $q_del = $sql->query(
        "DELETE FROM post WHERE post_id='$_POST[post_id]'"
    );

    if ($q_del) {
        echo 1;
    } else {
        echo 0;
    }

} catch (Exception $e) {
    echo $e;
}
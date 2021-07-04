<?php

include "../../../config/sql.php";
$sql = new Sql();
try {

    $q_del = $sql->query(
        "DELETE FROM users WHERE user_id='$_POST[user_id]'"
    );

    if ($q_del) {
        echo 1;
    } else {
        echo 0;
    }

} catch (Exception $e) {
    echo $e;
}
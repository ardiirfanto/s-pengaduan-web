
<?php

include "../config/sql.php";
include "json_response.php";

$sql = new Sql();
$json = new JSONResponse();
try {

    $get = $sql->query(
        "SELECT a.*, b.category_post 
        FROM post a JOIN category_post b
        ON a.category_post_id = b.category_post_id"
    )->fetch_all(MYSQLI_ASSOC);

    if ($get) {
        echo $json->success($get);
    } else {
        echo $json->failed(0);
    }
} catch (Exception $e) {
    echo $json->failed(0);
}

?>
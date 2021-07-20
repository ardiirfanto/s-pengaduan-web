
<?php

include "../config/sql.php";
include "json_response.php";

$sql = new Sql();
$json = new JSONResponse();
try {

    $get = $sql->query(
        "SELECT * FROM category_pengaduan ORDER BY category_pengaduan ASC"
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
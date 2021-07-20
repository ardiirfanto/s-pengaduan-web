
<?php

include "../config/sql.php";
include "json_response.php";

$sql = new Sql();
$json = new JSONResponse();
$warga_id = $_POST['warga_id'];
try {

    $get = $sql->query(
        "SELECT a.*, b.category_pengaduan 
        FROM pengaduan a JOIN category_pengaduan b
        ON a.category_pengaduan_id = b.category_pengaduan_id
        JOIN warga c ON a.warga_id = c.warga_id
        WHERE a.warga_id = '$warga_id'
        ORDER BY a.pengaduan_id DESC"
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
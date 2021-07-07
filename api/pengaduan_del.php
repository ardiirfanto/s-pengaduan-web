
<?php

include "../config/sql.php";
include "json_response.php";

$sql = new Sql();
$json = new JSONResponse();
$id = $_POST['id'];

$location = "../web/assets/doc/pengaduan/";
try {

    $getData = $sql->query("SELECT * FROM pengaduan WHERE pengaduan_id ='$id]'")->fetch_assoc();

    $file_available = glob($location . $getData['pengaduan_img']);
    foreach ($file_available as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }

    $get = $sql->query(
        "DELETE FROM pengaduan WHERE pengaduan_id='$id'"
    );

    if ($get) {
        echo $json->success("Berhasil Menghapus");
    } else {
        echo $json->failed(0);
    }
} catch (Exception $e) {
    echo $json->failed(0);
}

?>
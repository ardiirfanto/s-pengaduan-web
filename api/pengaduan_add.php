
<?php

include "../config/sql.php";
include "json_response.php";

$sql = new Sql();
$json = new JSONResponse();

$tmp = $_FILES['foto']['tmp_name'];
$location = "../web/assets/doc/pengaduan/";

$warga_id = $_POST['warga_id'];
$cat_id = $_POST['cat_id'];
$title = $_POST['title'];
$desc = $_POST['desc'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];

try {

    $foto = $_FILES['foto']['name'];
    $ex_foto = explode(".", $foto);
    $format = strtolower(end($ex_foto));
    $tgl = date("YmdHis");

    $nama_file = "PENG_" . $tgl . "." . $format;
    if (move_uploaded_file($tmp, $location . $nama_file)) {

        $q = $sql->query(
            "INSERT INTO pengaduan(
                category_pengaduan_id,
                warga_id,
                pengaduan_title,
                pengaduan_desc,
                pengaduan_date,
                pengaduan_status,
                pengaduan_img,
                lat,
                lng)
            VALUES(
                '$cat_id',
                '$warga_id',
                '$title',
                '$desc',
                NOW(),
                'Pending',
                '$nama_file',
                '$lat',
                '$lng',
            )"
        );

        if ($q) {
            $get = $sql->query(
                "SELECT a.*, b.category_pengaduan 
                FROM pengaduan a JOIN category_pengaduan b
                ON a.category_pengaduan_id = b.category_pengaduan_id
                JOIN warga c ON a.warga_id = c.warga_id
                WHERE a.pengaduan_img = '$nama_file"
            )->fetch_assoc();
        }
    }



    if ($get) {
        echo $json->success($get);
    } else {
        echo $json->failed(0);
    }
} catch (Exception $e) {
    echo $json->failed(0);
}

?>
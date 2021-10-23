<!-- Sweet Alert -->
<script src="../../assets/js/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

include "../../../config/sql.php";
$sql = new Sql();

$tmp = $_FILES['foto']['tmp_name'];
$location = "../../assets/doc/thumbnail/";

$cat_id = $_POST['cat_id'];
$title = addslashes($_POST['title']);
$content = addslashes($_POST['content']);
try {

    $foto = $_FILES['foto']['name'];
    $ex_foto = explode(".", $foto);
    $format = strtolower(end($ex_foto));
    $tgl = date("YmdHis");

    $nama_file = "THUMB_" . $tgl . "." . $format;

    if (move_uploaded_file($tmp, $location . $nama_file)) {

        $q = $sql->query(
            "INSERT INTO berita(category_post_id,post_title,post_thumbnail,post_content,post_date)
            VALUES('$cat_id','$title','$nama_file','$content',NOW())"
        );

        if ($q) {
?>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: "success",
                        title: "Proses Berhasil",
                        showConfirmButton: false,
                        timer: 1500,
                    }).then(function() {
                        window.location.replace("../../home?p=post");
                    });
                });
            </script>
        <?php
        } else {
        ?>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        text: "Proses Gagal",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1500,
                    }).then(function() {
                        window.location.replace("../../home?p=post_add");
                    });
                });
            </script>";
<?php
        }
    }
} catch (Exception $e) {
    echo $e;
}
?>
<!-- Sweet Alert -->
<script src="../../assets/js/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

include "../../../config/sql.php";
$sql = new Sql();

$tmp = $_FILES['foto']['tmp_name'];
$location = "../../assets/doc/thumbnail/";

$post_id = $_POST['post_id'];
$cat_id = $_POST['cat_id'];
$title = addslashes($_POST['title']);
$content = addslashes($_POST['content']);
try {

    if (!$tmp) {
        $q = $sql->query(
            "UPDATE berita SET 
            category_post_id='$cat_id', 
            post_title='$title',
            post_content='$content',
            post_date=NOW()
            WHERE post_id='$post_id'"
        );
    } else {

        $getData = $sql->query("SELECT * FROM berita WHERE post_id ='$post_id'")->fetch_assoc();

        $file_available = glob($location . $getData['post_thumbnail']);
        foreach ($file_available as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        $foto = $_FILES['foto']['name'];
        $ex_foto = explode(".", $foto);
        $format = strtolower(end($ex_foto));
        $tgl = date("YmdHis");

        $nama_file = "THUMB_" . $tgl . ".".$format;

        if (move_uploaded_file($tmp, $location . $nama_file)) {

            $q = $sql->query(
                "UPDATE post SET 
                category_post_id='$cat_id', 
                post_title='$title',
                post_thumbnail='$nama_file',
                post_content='$content',
                post_date=NOW()
                WHERE post_id='$post_id'"
            );
        }
    }

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
                    window.location.replace("../../home?p=post_edit&id=<?= $post_id ?>");
                });
            });
        </script>
<?php
    }
} catch (Exception $e) {
    echo $e;
}

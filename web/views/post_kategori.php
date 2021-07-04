<?php
include 'functions/kategori.php';

$cat = new Category();
if (isset($_GET['edit'])) {
    $data = $cat->get_cat_post($_GET['edit']);
}
?>
<!-- Form Add/Edit -->
<div class="row">
    <div class="col-md-12">
        <div id="accordion">
            <div class="card mb-0">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0 mt-0 font-14 text-right">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="text-dark">
                            <button class="btn btn-primary" type="button">
                                <?= (isset($_GET['edit'])) ? 'Ubah' : 'Tambah' ?> Data
                            </button>
                        </a>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse <?= (isset($_GET['edit'])) ? 'show' : '' ?>" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="">Nama Kategori</label>
                                <input value="<?= $data['category_post_id'] ?? '' ?>" type="hidden" id="cat_id">
                                <input value="<?= $data['category_post'] ?? '' ?>" id="cat" type="text" class="form-control">
                                <br>
                                <button onclick="save()" class="btn btn-primary btn-block" type="button">
                                    Simpan Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table Data -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="font-16 mt-0">Data Kategori Post/Informasi</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($cat->view_cat_post() as $k => $v) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $v['category_post'] ?></td>
                                        <td>
                                            <a href="home?p=post_kategori&edit=<?= $v['category_post_id'] ?>" type="button" class="btn btn-info">Edit</a>
                                            <button onclick="del(<?= $v['category_post_id'] ?>)" type="button" class="btn btn-danger">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function save() {

        let url = "functions/post/post_kategori_<?= (isset($_GET['edit'])) ? 'edit' : 'add' ?>";

        let cat_id = $("#cat_id").val()
        let cat = $("#cat").val()
        
        console.log(url);

        $.ajax({
            url: url,
            method: "POST",
            data: {
                'cat_id': cat_id,
                'cat': cat
            },
            success: function(res) {
                console.log(res)
                if (res == 1) {
                    processSuccess("Proses Berhasil", "home?p=post_kategori");
                } else if (res == 2) {
                    processFailed("Gagal Memproses Data")
                } else if (res == 0) {
                    processFailed("Gagal Memproses User")
                } else {
                    processFailed(res)
                }
            }
        })



    }

    function del(cat_id) {

        let url = "functions/post/post_kategori_del";

        swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Data yang terhapus akan hilang secara permanen!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Iya, Hapus",
                cancelButtonText: "Batal",
                confirmButtonClass: "btn btn-success",
                cancelButtonClass: "btn btn-primary"
            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST', // Metode pengiriman data menggunakan POST
                        url: url, // File yang akan memproses data
                        data: {
                            'cat_id': cat_id
                        },
                        dataType: "html",
                        success: function(res) {
                            console.log(res)
                            if (res == 1) {
                                processSuccess("Proses Berhasil", "home?p=post_kategori");
                            } else if (res == 0) {
                                processFailed("Proses Gagal")
                            } else {
                                processFailed(res)
                            }
                        }
                    });
                }
            })
    }
</script>
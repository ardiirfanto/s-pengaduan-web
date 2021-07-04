<?php
include 'functions/kategori.php';

$cat = new Category();


?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0 mt-0 font-14 text-right">
                    Tambah Post Baru
                </h5>
            </div>
            <div class="card-body">
                <form action="functions/post/post_add" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">Thumbnail Post</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Kategori Post</label>
                            <select name="cat_id" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <?php
                                foreach ($cat->view_cat_post() as $k => $v) {
                                ?>
                                    <option value="<?= $v['category_post_id'] ?>"><?= $v['category_post'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="">Judul Post</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="">Konten Post</label>
                            <textarea name="content" class="summernote"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function save() {

        let url = "functions/post/post_add";

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
                    processSuccess("Proses Berhasil", "home?p=post");
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
</script>
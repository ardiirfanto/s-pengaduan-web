<?php
include 'functions/kategori.php';
include 'functions/post/post.php';

$cat = new Category();

$post = new Post();

$get = $post->get_post($_GET['id']);

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
                <form action="functions/post/post_edit" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">Thumbnail Post</label>
                            <input value="<?= $_GET['id'] ?>" type="hidden" name="post_id" class="form-control">
                            <input type="file" name="foto" class="form-control">
                            <p style="color:crimson">Kosongkan Thumbnail Jika tidak ingin merubah</p>
                        </div>
                        <div class="col-md-6">
                            <label for="">Kategori Post</label>
                            <select name="cat_id" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <?php
                                foreach ($cat->view_cat_post() as $k => $v) {
                                ?>
                                    <option <?php if ($get['category_post_id'] == $v['category_post_id']) {
                                                echo 'SELECTED';
                                            } ?> value="<?= $v['category_post_id'] ?>"><?= $v['category_post'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="">Judul Post</label>
                            <input value="<?= $get['post_title'] ?? '' ?>" type="text" name="title" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="">Konten Post</label>
                            <textarea name="content" class="summernote"><?= $get['post_content'] ?? '' ?></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
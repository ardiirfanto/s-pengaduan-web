<?php
include 'functions/post/post.php';

$post = new Post();

?>

<div class="row">
    <div class="col-md-12">
        <a href="home?p=post_add" class="btn btn-primary">
            Tambah Post
        </a>
    </div>
</div>
<hr>

<!-- Table Data -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="font-16 mt-0">Data Post/Informasi</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th width="10px" >No</th>
                                    <th width="100px">Thumbnail</th>
                                    <th>Post</th>
                                    <th width="100px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($post->view_post() as $k => $v) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <img width="100px" src="assets/doc/thumbnail/<?= $v['post_thumbnail'] ?>" alt="">
                                        </td>
                                        <td><p style="word-wrap: break-word;white-space: pre-wrap;"><?= $v['post_title'] ?></p></td>
                                        <td>
                                            <a href="home?p=post_edit&id=<?= $v['post_id'] ?>" type="button" class="btn btn-info">Edit</a>
                                            <button onclick="del(<?= $v['post_id'] ?>)" type="button" class="btn btn-danger">
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
    function del(post_id) {

        let url = "functions/post/post_del";

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
                            'post_id': post_id
                        },
                        dataType: "html",
                        success: function(res) {
                            console.log(res)
                            if (res == 1) {
                                processSuccess("Proses Berhasil", "home?p=post");
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
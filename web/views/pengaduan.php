<?php
include 'functions/pengaduan/pengaduan.php';

$peng = new Pengaduan();

?>

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
                        <table id="datatable" class="table table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th width="10px" >No</th>
                                    <th>Waktu Laporan</th>
                                    <th>Nama Pelapor</th>
                                    <th>Judul</th>
                                    <th>Kategori Laporan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($peng->view() as $k => $v) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= date_format(new DateTime($v['pengaduan_date']),"d/m/Y H:i") ?></td>
                                        <td><?= $v['warga_name'] ?></td>
                                        <td style="word-wrap: break-word;white-space: pre-wrap;"><?= $v['pengaduan_title'] ?></td>
                                        <td><?= $v['category_pengaduan'] ?></td>
                                        <td>
                                            <a href="home?p=pengaduan_detail&id=<?= $v['pengaduan_id'] ?>" type="button" class="btn btn-primary">Detail</a>
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
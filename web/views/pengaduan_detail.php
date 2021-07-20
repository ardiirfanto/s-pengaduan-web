<?php
include 'functions/pengaduan/pengaduan.php';

$peng = new Pengaduan();

$get = $peng->get($_GET['id']);

if ($get['pengaduan_status'] == 'Pending') {
    $badge = 'warning';
} else if ($get['pengaduan_status'] == 'Proses') {
    $badge = 'info';
} else {
    $badge = 'success';
}

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Laporan Tanggal : <?= date_format(new DateTime($get['pengaduan_date']), "d/m/Y H:i") ?> </h6>
                        <div class="badge badge-<?= $badge ?>"><?= $get['pengaduan_status'] ?></div>
                    </div>
                    <div class="col-md-6 text-right">
                        <?php
                        if ($get['pengaduan_status'] == 'Pending') {
                        ?>
                            <button onclick="update('Proses')" class="btn btn-sm btn-info">Proses Laporan</button>
                        <?php
                        } else {
                        ?>
                            <button onclick="update('Selesai')" class="btn btn-sm btn-success">Laporan Selesai</button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <b>Judul</b>
                    </div>
                    <div class="col-md-9">
                        : <?= $get['pengaduan_title'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <b>Nama Pelapor</b>
                    </div>

                    <div class="col-md-9">
                        : <?= $get['warga_name'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <b>Kategori</b>
                    </div>
                    <div class="col-md-9">
                        : <?= $get['category_pengaduan'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <b>Keterangan</b>
                    </div>
                    <div class="col-md-9 text-justify">
                        : <?= $get['pengaduan_desc'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <b>Lokasi Kejadian</b>
                    </div>
                    <div class="col-md-9">
                        <a target="_blank" href="http://maps.google.com/maps?q=<?= $get['lat'] . ',' . $get['lng'] ?>" type="button" class="btn btn-sm btn-danger ">
                            Tracking Lokasi Kejadian
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6> Bukti Laporan
                </h6>
                <hr>
                <img style="height:500px;" src="assets/doc/pengaduan/<?= $get['pengaduan_img'] ?>" alt="">
            </div>
        </div>
    </div>
</div>

<script>
    function update(status) {

        let url = "functions/pengaduan/pengaduan_update";
        var id = <?= $get['pengaduan_id'] ?>

        swal.fire({
                title: "Yakin ingin merubah status Laporan ini?",
                text: "Klik Ya untuk merubah status laporan",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Iya, Update",
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
                            'id': id,
                            'status': status,
                        },
                        dataType: "html",
                        success: function(res) {
                            console.log(res)
                            if (res == 1) {
                                processSuccess("Proses Berhasil", "home?p=pengaduan_detail&id=" + id);
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
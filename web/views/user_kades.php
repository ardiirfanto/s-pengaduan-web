<?php
include 'functions/user/user_view.php';

$user = new User();
if (isset($_GET['edit'])) {
    $data = $user->get_user($_GET['edit']);
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
                                <label for="">Username</label>
                                <input value="<?= $data['user_id'] ?? '' ?>" type="hidden" id="user_id">
                                <input value="<?= $data['username'] ?? '' ?>" id="username" type="text" class="form-control">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Password</label>
                                <input id="password" type="text" class="form-control">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Nama</label>
                                <input value="<?= $data['name'] ?? '' ?>" id="nama" type="text" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Gender</label>
                                <select id="gender" id="" class="form-control">
                                    <option value="L" <?= (isset($data['gender'])) ? (($data['gender'] == 'L') ? 'SELECTED' : '') : '' ?>>Laki-Laki</option>
                                    <option value="P" <?= (isset($data['gender'])) ? (($data['gender'] == 'P') ? 'SELECTED' : '') : '' ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Alamat</label>
                                <textarea id="alamat" type="text" rows="2" class="form-control"><?= $data['alamat'] ?? '' ?></textarea>
                            </div>
                            <div class="col-md-12">
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
                    <h4 class="font-16 mt-0">Data Kades</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($user->view_kades() as $k => $v) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $v['kades_name'] ?></td>
                                        <td><?= $v['username'] ?></td>
                                        <td><?= $v['kades_gender'] ?></td>
                                        <td><?= $v['kades_alamat'] ?></td>
                                        <td>
                                            <a href="home?p=user_kades&edit=<?= $v['user_id'] ?>" type="button" class="btn btn-info">Edit</a>
                                            <button onclick="del(<?= $v['user_id'] ?>)" type="button" class="btn btn-danger">
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

        let url = "functions/user/user_<?= (isset($_GET['edit'])) ? 'edit' : 'add' ?>";

        let user_id = $("#user_id").val()
        let username = $("#username").val()
        let password = $("#password").val()
        let nama = $("#nama").val()
        let gender = $("#gender").val()
        let alamat = $("#alamat").val()
        let role = "kades"
        let phone = $("#phone").val()

        $.ajax({
            url: url,
            method: "POST",
            data: {
                'user_id': user_id,
                'username': username,
                'password': password,
                'name': nama,
                'gender': gender,
                'alamat': alamat,
                'role': role,
                'phone': phone
            },
            success: function(res) {
                console.log(res)
                if (res == 1) {
                    processSuccess("Proses Berhasil", "home?p=user_kades");
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

    function del(user_id) {

        let url = "functions/user/user_del";

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
                            'user_id': user_id
                        },
                        dataType: "html",
                        success: function(res) {
                            console.log(res)
                            if (res == 1) {
                                processSuccess("Proses Berhasil", "home?p=user_kades");
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
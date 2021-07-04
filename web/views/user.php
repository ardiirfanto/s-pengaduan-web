<?php

if (isset($_GET['edit'])) {

    $data = get_user($_GET['edit']);
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
                            <div class="col-md-6 form-group">
                                <label for="">Role</label>
                                <select onchange="set_role()" id="role" class="form-control">
                                    <option value="kades">Kades</option>
                                    <option value="warga">Warga</option>
                                </select>
                            </div>
                            <div id="phone_div" class="col-md-6 form-group" hidden>
                                <label for="">No.Hp</label>
                                <input value="<?= $data['phone'] ?? '' ?>" id="phone" type="text" class="form-control">
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
<br>

<div class="row" id="content">

</div>


<script>

    function set_content(tipe){

        console.log(tipe)
        if(tipe == 'warga'){
            $("#content").load("views/user_warga.php");
        } else{
            $("#content").load("views/user_kades.php");
        }
    }

    function set_role() {

        var role = $('#role').val()

        if (role == 'warga') {
            $('#phone_div').removeAttr('hidden')
        } else {
            $('#phone_div').attr('hidden', true)
        }

    }

    function save() {

        let url = "functions/user/user_<?= (isset($_GET['edit'])) ? 'edit' : 'add' ?>";

        let username = $("#username").val()
        let password = $("#password").val()
        let nama = $("#nama").val()
        let gender = $("#gender").val()
        let alamat = $("#alamat").val()
        let role = $("#role").val()
        let phone = $("#phone").val()

        $.ajax({
            url: url,
            method:"POST",
            data: {
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
                    processSuccess("Berhasil Menambah Data", "home?p=user");
                } else if (res == 2) {
                    processFailed("Gagal Menyimpan Data")
                } else if (res == 0) {
                    processFailed("Gagal Menyimpan User")
                } else {
                    processFailed(res)
                }
            }
        })



    }
</script>
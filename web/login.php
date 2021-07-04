<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Login | Sistem Pengaduan Masyarakat</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets/images/Icon.png">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card card-pages shadow-none">

            <div class="card-body">
                <div class="text-center m-t-0 m-b-15">
                    <a href="#" class="logo logo-admin"><img src="assets/images/icon-header.png" alt="" height="50"></a>
                </div>
                <h5 class="font-18 text-center">Halaman Login</h5>

                <form class="form-horizontal m-t-30" action="">

                    <div class="form-group">
                        <div class="col-12">
                            <label>Username</label>
                            <input id="username" class="form-control" type="text" required="" placeholder="Username">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label>Password</label>
                            <input id="password" class="form-control" type="password" required="" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button onclick="login()" type="button" class="btn btn-primary btn-block btn-lg waves-effect waves-light">Log In</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <!-- Alert js -->
    <script src="alert.js"></script>

    <script>
        function login() {

            var username = $('#username').val()
            var password = $('#password').val()
            var url = "functions/auth/login";

            $.ajax({
                url: url,
                method: "POST",
                data: {
                    "username": username,
                    "password": password
                },
                success: function(res) {
                    console.log(res);
                    if (res == 1) {
                        processSuccess("Login Berhasil", "home");
                    } else if (res == 2) {
                        processFailed("Akun tidak ada")
                    } else if (res == 0) {
                        processFailed("Password Salah")
                    } else {
                        processFailed(res)
                    }
                }
            })

        }
    </script>

</body>

</html>
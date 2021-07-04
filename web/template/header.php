<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="#" class="logo">
            <span class="logo-light">
                <i class="mdi mdi-information"></i>Sistem Pengaduan
            </span>
            <span class="logo-sm">
                <i class="mdi mdi-information"></i>
            </span>
        </a>
    </div>

    <nav class="navbar-custom">
        <ul class="navbar-right list-inline float-right mb-0">

            <li class="dropdown notification-list list-inline-item">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/users/user.jpg" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item"><i class="mdi mdi-account-circle"></i> <?= $_SESSION['username'] ?> </div>                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" onclick="logout()" href="#"><i class="mdi mdi-power text-danger"></i> Logout</a>
                    </div>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
        </ul>

    </nav>

</div>

<script>

function logout(){

    $.ajax({
        url:"functions/auth/logout",
        success:function(res){

            window.location.href='login'

        }
    })

}

</script>
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="home?" class="waves-effect <?= (!(isset($_GET['p'])) ? 'mm-active' : '') ?>">
                        <i class="icon-home"></i> <span> Halaman Utama </span>
                    </a>
                </li>
                <li class="menu-title">Data Master</li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect <?= ($_GET['p'] == 'user_warga' || $_GET['p'] == 'user_kades' ? 'mm-active' : '') ?>">
                        <i class="icon-profile"></i>
                        <span> Data Pengguna
                            <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </span>
                    </a>
                    <ul class="submenu <?= ($_GET['p'] == 'user_warga' || $_GET['p'] == 'user_kades' ? 'mm-show' : '') ?>">
                        <li class="waves-effect <?= ($_GET['p'] == 'user_warga' ? 'mm-active' : '') ?>"><a href="home?p=user_warga">Data Warga</a></li>
                        <li class="waves-effect <?= ( $_GET['p'] == 'user_kades' ? 'mm-active' : '') ?>"><a href="home?p=user_kades">Data Kades</a></li>
                    </ul>
                </li>
                <li>
                    <a href="home?p=pengaduan_kategori" class="waves-effect <?= ($_GET['p'] == 'pengaduan_kategori' ? 'mm-active' : '') ?>">
                        <i class="icon-folder"></i> <span> Kategori Pengaduan </span>
                    </a>
                </li>
                <li>
                    <a href="home?p=post_kategori" class="waves-effect <?= ($_GET['p'] == 'post_kategori' ? 'mm-active' : '') ?>">
                        <i class="icon-folder"></i> <span> Kategori Informasi/Post </span>
                    </a>
                </li>

                <li class="menu-title">Data Pengaduan</li>

                <li>
                    <a href="home?p=pengaduan" class="waves-effect <?= ($_GET['p'] == 'pengaduan' ? 'mm-active' : '') ?>">
                        <i class="icon-paper-pencil"></i> <span> List Pengaduan </span>
                    </a>
                </li>

                <li class="menu-title">Data Informasi/Post</li>

                <li>
                    <a href="home?p=post" class="waves-effect <?= ($_GET['p'] == 'post' ? 'mm-active' : '') ?>">
                        <i class="icon-pencil"></i> <span> List Informasi/Post </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
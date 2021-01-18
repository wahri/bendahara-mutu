<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?= base_url() ?>" class="site_title"><span>SMK - MUTU</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?= base_url('upload/images/') . $user_login['foto'] ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $user_login['username'] ?></h2>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/siswa') ?>"><i class="fa fa-sitemap"></i> Siswa Management</a>
                    </li>
                    <!-- <li><a href="<?= base_url('admin/keuangan') ?>"><i class="fa fa-dollar"></i> Keuangan Management </a>
                    </li> -->
                    <li>
                        <a href="<?= base_url('admin/user') ?>"><i class="fa fa-sitemap"></i> User Management</a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/tagihan') ?>"><i class="fa fa-sitemap"></i> Tagihan Management </a>
                        <!-- <ul class="nav child_menu">
                            <li><a href="<?= base_url('admin/tagihan') ?>">Tagihan</a></li>
                            <li><a href="<?= base_url('admin/tagihan/diskon') ?>">Diskon Tagihan</a></li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="<?= base_url('admin/uang_keluar') ?>"><i class="fa fa-sitemap"></i> Pengeluaran Management</a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Akun</h3>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('admin/profile') ?>"><i class="fa fa-user"></i> Profile </a>
                    </li>
                    <li><a href="<?= base_url('admin/pengaturan') ?>"><i class="fa fa-wrench"></i> Pengaturan Akun </a>
                    </li>
                    <li><a href="<?= base_url('login/logout') ?>"><i class="fa fa-power-off"></i> Logout Akun </a>
                    </li>
                </ul>
            </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <!-- <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> -->
                &nbsp;
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <!-- <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span> -->
                &nbsp;
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <!-- <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> -->
                &nbsp;
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('login/logout') ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
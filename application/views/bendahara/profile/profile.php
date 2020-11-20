<?php $this->load->view('admin/template/header') ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('bendahara/template/sidebar') ?>

            <?php $this->load->view('bendahara/template/topbar') ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="row">
                        <div class="col-1">
                            <a id="cartButton" href="<?= base_url('bendahara/dashboard') ?>" class="btn btn-lg btn-success">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row mt-2">
                        <div class="col-md-10">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Profile</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row pb-4">
                                        <div class="col-4">
                                            <img src="<?= base_url('upload/images/') . $user_login['foto'] ?>" alt="Foto Profil" class="img-thumbnail img-profile">
                                        </div>
                                        <div class="col-8 d-flex flex-column justify-content-center">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5 class="text-success">Username</h5>
                                                    <h5 class="text-success">Level</h5>
                                                    <h5 class="text-success">Status</h5>
                                                    <h5 class="text-success">Login Terakhir</h5>
                                                </div>
                                                <div class="col-6">
                                                    <h5>
                                                        : <?= $user_login['username'] ?>
                                                    </h5>
                                                    <h5>
                                                        : Bendahara
                                                    </h5>
                                                    <h5>
                                                        : Aktif
                                                    </h5>
                                                    <h5>
                                                        : <?= $user_login['last_login'] ?>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>


        <!-- /page content -->
        <?php $this->load->view('admin/template/footer') ?>

</body>


</html>
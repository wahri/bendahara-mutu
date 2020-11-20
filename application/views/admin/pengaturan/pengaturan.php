<?php $this->load->view('admin/template/header') ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('admin/template/sidebar') ?>

            <?php $this->load->view('admin/template/topbar') ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="row">
                        <div class="col-1">
                            <a id="cartButton" href="<?= base_url('admin/dashboard') ?>" class="btn btn-lg btn-success">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row mt-2">
                        <div class="col-md-8">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Password</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa fa-key fa-4x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-8">
                                            <h4 class="text-success">Ubah Password</h4>
                                            <h6>Anda dapat mengubah password dengan menekan tombol edit</h6>
                                        </div>
                                        <div class="col-2 d-flex flex-column justify-content-center align-content-center">
                                            <a href="<?= base_url('admin/pengaturan/ganti_password') ?>" class="btn btn-success">
                                                Edit
                                            </a>
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
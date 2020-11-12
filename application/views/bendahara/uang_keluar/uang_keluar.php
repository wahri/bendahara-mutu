<?php $this->load->view('bendahara/template/header') ?>

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
                        <div class="col-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Uang Keluar</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="<?= base_url('bendahara/uangkeluar/buat_akun') ?>" class="btn btn-success">
                                                Buat akun
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-4">
                                            <div class="card card-balance  text-white mb-3" style="max-width: 20rem;">
                                                <div class="card-header bg-light-blue"> Akun 1</div>
                                                <div class="card-body d-flex flex-column justify-content-around py-4 bg-dark-blue justify-content-center">
                                                    <span class="balance text-center">
                                                        Rp.1.000.000
                                                    </span>
                                                    <a class="btn btn-sm btn-success mt-4">
                                                        Lihat Detail
                                                    </a>
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

            <?php $this->load->view('bendahara/template/footer') ?>

</body>


</html>
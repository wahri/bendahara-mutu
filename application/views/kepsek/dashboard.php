<?php $this->load->view('kepsek/template/header') ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('kepsek/template/sidebar') ?>

            <?php $this->load->view('kepsek/template/topbar') ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Dashboard kepsek</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_content">
                                    <div class="row justify-content-start">
                                        <div class="col-md-4">
                                            <div class="card  text-white mb-3" style="max-width: 30rem; ">
                                                <div class="card-header bg-light-blue">Data Siswa</div>
                                                <div class="card-body py-4 bg-dark-blue">
                                                    <span class="card-count"><?= $jml_siswa_aktif ?></span>
                                                    <a class="custom-link" href="<?= base_url('bendahara/pembayaran') ?>">
                                                        <h5 class="card-title d-inline ml-2">Siswa Aktif</h5>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card  text-white mb-3" style="max-width: 30rem; ">
                                                <div class="card-header bg-light-blue">Data Siswa</div>
                                                <div class="card-body py-4 bg-dark-blue">
                                                    <span class="card-count"><?= $jml_alumni ?></span>
                                                    <a class="custom-link" href="<?= base_url('bendahara/pembayaran') ?>">
                                                        <h5 class="card-title d-inline ml-2">Alumni</h5>
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

            <?php $this->load->view('kepsek/template/footer') ?>
</body>

</html>
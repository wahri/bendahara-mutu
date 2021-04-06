<?php $this->load->view('admin/template/header') ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('admin/template/sidebar') ?>

            <?php $this->load->view('admin/template/topbar') ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <!-- <div class="row justify-content-center">
                    <div class="col-12 col-md-4">
                        <div class="card  text-white mb-3" style="max-width: 30rem; ">
                            <div class="card-header bg-light-blue">Data Pembayaran</div>
                            <div class="card-body py-4 bg-dark-blue">
                                <i class="fa fa-usd fa-2x" aria-hidden="true"></i>
                                <a class="custom-link" href="<?= base_url('bendahara/pembayaran') ?>">
                                    <h5 class="card-title d-inline ml-2">Pembayaran</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card  text-white mb-3" style="max-width:30rem; ">
                            <div class="card-header bg-light-blue">Data Uang Keluar</div>
                            <div class="card-body py-4 bg-dark-blue">
                                <i class="fa fa-usd fa-2x" aria-hidden="true"></i>
                                <a class="custom-link" href="uangkeluar.html">
                                    <h5 class="card-title d-inline ml-2">Uang Keluar</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card  text-white mb-3" style="max-width:30rem; ">
                            <div class="card-header bg-light-blue">Laporan</div>
                            <div class="card-body py-4 bg-dark-blue">
                                <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
                                <a class="custom-link" href="pembayaran.html">
                                    <h5 class="card-title d-inline ml-2">Laporan</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="">

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-1">
                            <a id="cartButton" href="<?= base_url('admin/siswa') ?>" class="btn btn-lg btn-success">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Upload Data Siswa</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php if (!empty($this->session->flashdata('message'))) : ?>
                                        <div class="alert alert-success alert-dismissible " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <?php echo $this->session->flashdata('message'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($this->session->flashdata('message_error'))) : ?>
                                        <div class="alert alert-error alert-dismissible " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <?php echo $this->session->flashdata('message_error'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <form action="<?= base_url('admin/siswa/importdatasiswates') ?>" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group border border-info p-3">
                                                    <label for="file">Upload data siswa</label>
                                                    <input type="file" name="file" class="form-control-file">
                                                    <!-- <p class="text-danger mt-2">Error</p> -->
                                                </div>
                                                <div class="form-row mt-3">
                                                    <!-- <div class="form-group col-md-6">
                                                        <label for="uang_kat">Uang KAT</label>
                                                        <div class="input-group flex-nowrap">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp</span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="0" name="kat" id="kat">
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group col-md-6">
                                                        <label for="uang_spp">Uang SPP</label>
                                                        <div class="input-group flex-nowrap">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp</span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="0" name="spp" id="spp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-sm mt-2">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php $this->load->view('admin/template/footer') ?>

</body>

</html>
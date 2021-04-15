<?php $this->load->view('bendahara/template/header') ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('bendahara/template/sidebar') ?>

            <?php $this->load->view('bendahara/template/topbar') ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="row justify-content-start">
                    <div class="col-12 col-md-4">
                        <div class="card  text-white mb-3" style="max-width:30rem; ">
                            <div class="card-header bg-light-blue">Laporan</div>
                            <div class="card-body py-4 bg-dark-blue">
                                <i class="fas fa-print fa-2x" aria-hidden="true"></i>
                                <a class="custom-link" href="<?= base_url('bendahara/laporan/laporanhutang') ?>">
                                    <h5 class="card-title d-inline ml-2"> Cetak Laporan Hutang</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card  text-white mb-3" style="max-width:30rem; ">
                            <div class="card-header bg-light-blue">Laporan</div>
                            <div class="card-body py-4 bg-dark-blue">
                                <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
                                <a class="custom-link" href="<?= base_url('bendahara/laporan/cashflow') ?>">
                                    <h5 class="card-title d-inline ml-2"> Laporan Keuangan</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <?php $this->load->view('bendahara/template/footer') ?>
</body>

</html>
<?php $this->load->view('bendahara/template/header') ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('bendahara/template/sidebar') ?>

            <?php $this->load->view('bendahara/template/topbar') ?>


            <!-- /page content -->
            <div class="right_col" role="main">
                <div class="row justify-content-center">
                    <div class="col-6 text-center">
                        <h4 class="mt-4 text-black">Transaksi Berhasil!</h4>
                        <img style="width: 400px; height: 300px;" src="<?= base_url('assets/img/success.svg') ?>" alt="">
                    </div>
                </div>

                <div class="row justify-content-center mt-4">
                    <div class="col-2">
                        <a href="<?= base_url('bendahara/transaksi/print/' . $kode_transaksi) ?>" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>Print
                            Invoice</a>
                    </div>

                    <div class="col-2">
                        <a class="btn btn-primary" href="<?= base_url('bendahara/pembayaran') ?>">Back</a>
                    </div>
                </div>
            </div>
            <!-- footer content -->


        </div>
        <!-- /page content -->

        <?php $this->load->view('bendahara/template/footer') ?>
</body>

</html>
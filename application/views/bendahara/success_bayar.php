<?php $this->load->view('bendahara/template/header') ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('bendahara/template/sidebar') ?>

            <?php $this->load->view('bendahara/template/topbar') ?>


            <!-- /page content -->
            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <section class="content invoice">
                                    <!-- title row -->
                                    <div class="row justify-content-center">
                                        <div class="invoice-header">
                                            <h3 class="text-success">Transaksi Berhasil!</h3>

                                        </div>
                                        <!-- /.col -->
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <h1>
                                                <small class="pull-right"><?= '#' . $transaksi['kode_transaksi'] ?></small>
                                            </h1>

                                        </div>
                                    </div>


                                    <!-- Table row -->
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <h4>Waktu Transaksi : <?= date('d M Y H:i:s', strtotime($transaksi['date'])) ?></h4>
                                        </div>
                                        <div class="col-12 table">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Nama Item</th>
                                                        <th>Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    foreach ($transaksi_detail as $td) : ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $td['nama_item'] ?></td>
                                                            <td><?= 'Rp.' . number_format($td['nominal'], 2, ',', '.') ?></td>
                                                        </tr>

                                                    <?php $i++;
                                                    endforeach; ?>
                                                </tbody>

                                                <tfoot>
                                                    <tr>
                                                        <td colspan="2" class="text-right font-weight-bold">
                                                            Total
                                                        </td>
                                                        <td>
                                                            <?= 'Rp.' . number_format($transaksi['total'], 2, ',', '.') ?>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <div class="col-6">
                                            <a href="<?= base_url('bendahara/transaksi/print/') . $transaksi['kode_transaksi'] ?>" class="btn btn-success"><i class="fa fa-print"></i>Print</a>
                                        </div>
                                    </div>

                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer content -->


        </div>
        <!-- /page content -->

        <?php $this->load->view('bendahara/template/footer') ?>
</body>

</html>
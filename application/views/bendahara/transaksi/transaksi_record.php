<?php $this->load->view('bendahara/template/header') ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('bendahara/template/sidebar') ?>

            <?php $this->load->view('bendahara/template/topbar') ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-1">
                        <a id="cartButton" href="<?= base_url('bendahara/pembayaran/detail/') . $nis ?>" class="btn btn-lg btn-success">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Record Transaksi</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col">
                                        <table id="data-table" class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th>Kode Transaksi</th>
                                                    <th>Waktu Transaksi</th>
                                                    <th>Jumlah Transaksi</th>
                                                    <th style="width: 20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($transaksi as $item) : ?>
                                                    <tr>
                                                        <td><?= $item['kode_transaksi'] ?></td>
                                                        <td><?= date('d F Y', strtotime($item['date'])) ?></td>
                                                        <td>Rp. <?= number_format($item['total'], 0, ',', '.') ?></td>
                                                        <td>
                                                            <a href="<?= base_url('bendahara/transaksi/print/' . $item['kode_transaksi']) ?>" class="btn btn-primary">
                                                                <i class="fa fa-print" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="<?= base_url('bendahara/transaksi/success/' . $item['kode_transaksi']) ?>" class="btn btn-dark">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
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

<script>
    $(document).ready(function() {
        $('#data-table').DataTable({
            "order": [
                ["1", "desc"]
            ]
        });
    });
</script>
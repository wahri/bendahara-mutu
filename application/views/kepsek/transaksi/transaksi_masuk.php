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
                    <div class="row">
                        <div class="col-1">
                            <button onclick="goBack()" class="btn btn-lg btn-success">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row mt-2">
                        <div class="col-md-8">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Detail Transaksi</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-6">
                                            <h2>Nama Siswa</h2>
                                            <h2>NIS</h2>
                                            <h2>Tanggal</h2>
                                            <h2>Jam</h2>
                                        </div>
                                        <div class="col-6">
                                            <h2 class="text-success">
                                                : <?= $transaksi['nama'] ?>
                                            </h2>
                                            <h2 class="text-success">
                                                : <?= $transaksi['nis'] ?>
                                            </h2>
                                            <h2 class="text-success">
                                                : <?= date('d F Y', strtotime($transaksi['date'])) ?>
                                            </h2>
                                            <h2 class="text-success">
                                                : <?= date('H:i', strtotime($transaksi['date'])) ?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-8">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tabel Item Transaksi</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table class="table mt-2">
                                        <thead class="thead-darkblue">
                                            <tr>
                                                <th>Nama Item</th>
                                                <th>Nominal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($transaksi_detail as $d) : ?>
                                                <tr>
                                                    <td><?= $d['nama_item'] ?></td>
                                                    <td>Rp. <?= number_format($d['nominal'], 0, '.', ',') ?></td>
                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot class="thead-darkblue">
                                            <tr>
                                                <td class="text-right">Total</td>
                                                <td>Rp. <?= number_format($transaksi['total'], 0, '.', ',') ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <!-- /page content -->
            <?php $this->load->view('kepsek/template/footer') ?>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
</body>


</html>
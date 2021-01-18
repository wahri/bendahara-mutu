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
                        <div class="col-1">
                            <a id="cartButton" href="<?= base_url('bendahara/laporan/uang_keluar') ?>" class="btn btn-lg btn-success">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
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
                                            <h2>Nama Akun</h2>
                                            <h2>Date</h2>
                                            <h2>Time</h2>
                                        </div>
                                        <div class="col-6">
                                            <h2 class="text-success">
                                                : Akun 1
                                            </h2>
                                            <h2 class="text-success">
                                                : 24/09/2020
                                            </h2>
                                            <h2 class="text-success">
                                                : 10:20:59
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
                                            <tr>
                                                <td>Item 1</td>
                                                <td>Rp.300.000</td>
                                            </tr>
                                            <tr>
                                                <td>Item 2</td>
                                                <td>Rp.300.000</td>
                                            </tr>
                                            <tr>
                                                <td>Item 3</td>
                                                <td>Rp.300.000</td>
                                            </tr>

                                        </tbody>
                                        <tfoot class="thead-darkblue">
                                            <tr>
                                                <td class="text-right">Total</td>
                                                <td>Rp.900.000</td>
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
            <?php $this->load->view('bendahara/template/footer') ?>

</body>


</html>
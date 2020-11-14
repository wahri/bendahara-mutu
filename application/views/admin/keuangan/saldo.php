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
                            <a id="cartButton" href="<?= base_url('admin/keuangan') ?>" class="btn btn-lg btn-success">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Informasi Akun</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-6">
                                            <h2>Nama Akun </h2>
                                            <h2>Saldo Sekarang </h2>
                                            <h2>Status </h2>
                                        </div>
                                        <div class="col-6">
                                            <h2 class="text-success">
                                                : Akun1
                                            </h2>
                                            <h2 class="text-success">
                                                : Rp.900.000
                                            </h2>
                                            <h2 class="text-success">
                                                : Aktif
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tabel Saldo Periode</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <a class="btn btn-sm btn-success" href="<?= base_url('admin/keuangan/tambah_saldo/1') ?>">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Saldo
                                    </a>
                                    <table class="table mt-2">
                                        <thead class="thead-darkblue">
                                            <tr>
                                                <th>Nama Saldo</th>
                                                <th>Nominal</th>
                                                <th>Terpakai</th>
                                                <th>Periode</th>
                                                <th>Expired</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Saldo 1</td>
                                                <td>Rp.1.000.000</td>
                                                <td>Rp.100.000</td>
                                                <td></td>
                                                <td>14/11/2020</td>
                                                <td>Aktif</td>
                                                <td>
                                                    <a href="#" class="btn btn-danger">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/keuangan/edit_saldo/1') ?>" class="btn btn-success">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
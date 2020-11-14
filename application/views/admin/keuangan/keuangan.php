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
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Keuangan</h3>
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
                        <div class="col-md-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tambah Akun</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <label for="nama_akun">Nama Akun</label>
                                            <input type="text" class="form-control" id="nama_akun" name="nama_akun">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tabel Data Akun</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table class="table mt-2">
                                        <thead class="thead-darkblue">
                                            <tr>
                                                <th>Nama Akun</th>
                                                <th>Status</th>
                                                <th>Saldo Sekarang</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Akun1</td>
                                                <td>Aktif</td>
                                                <td>Rp.900.000</td>
                                                <td>
                                                    <a href="<?= base_url('admin/keuangan/saldo/1') ?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
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
                        <!-- <div class="col-md-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tambah Akun</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="nama_akun">Nama Akun</label>
                                            <input type="text" class="form-control" id="nama_akun" name="nama_akun">
                                        </div>
                                        <button name="tambah_akun" type="submit" value="1" class="btn btn-success">Tambah Akun</button>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tabel Data Akun</h2>
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
                                    <a class="btn btn-sm btn-success" href="<?= base_url('admin/keuangan/tambah_saldo/1') ?>">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Saldo
                                    </a>
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
                                            <?php foreach ($akun as $d) : ?>
                                                <tr>
                                                    <td><?= $d['nama_akun'] ?></td>
                                                    <td><?= $d['status'] == 1 ? 'Active' : 'Inactive' ?></td>
                                                    <td>Rp.900.000</td>
                                                    <td>
                                                        <a href="<?= base_url('admin/keuangan/saldo/') . $d['id_akun'] ?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
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


            <!-- /page content -->
            <?php $this->load->view('admin/template/footer') ?>

</body>


</html>
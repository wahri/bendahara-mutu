<?php $this->load->view('admin/template/header') ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('bendahara/template/sidebar') ?>

            <?php $this->load->view('bendahara/template/topbar') ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Uang Keluar</h3>

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

                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tabel Transaksi Uang Keluar</h2>
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
                                    <a href="<?= base_url('bendahara/uang_keluar/tambah_transaksi') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Transaksi</a>
                                    <table class="table mt-2" id="dataTables">
                                        <thead class="thead-darkblue">
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama Pengambil</th>
                                                <th>Nominal</th>
                                                <th>Catatan</th>
                                                <!-- <th class="text-center">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($transaksi_pengeluaran as $d) : ?>
                                                <tr>
                                                    <td><?= date('d F Y', strtotime($d['datetime'])) ?></td>
                                                    <td><?= $d['nama_pemakai'] ?></td>
                                                    <td>Rp. <?= number_format($d['nominal'], 0, ',', '.') ?></td>
                                                    <td><?= $d['catatan'] ?></td>
                                                    <!-- <td class="text-center">
                                                        <a href="" class="btn btn-sm btn-danger">Hapus</a>
                                                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                    </td> -->
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
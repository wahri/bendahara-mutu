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
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="<?= base_url('bendahara/uang_keluar/tambah_transaksi') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Transaksi</a>

                                        </div>
                                        <div class="col-6 text-right">
                                            <?php
                                            $cash = $total_uangmasuk['total'] - $total_uangkeluar['nominal'] ;
                                            ?>
                                            <h2 class="btn btn-info btn-round">Cash : Rp. <?= number_format($cash,0,',','.') ?></h2>

                                        </div>
                                    </div>
                                    <table class="table mt-2 table-striped" id="dataTables">
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
                                                    <td class="align-middle"><?= date('d F Y', strtotime($d['datetime'])) ?></td>
                                                    <td class="align-middle"><?= $d['nama_pemakai'] ?></td>
                                                    <td class="align-middle">Rp. <?= number_format($d['nominal'], 0, ',', '.') ?></td>
                                                    <td><?= nl2br($d['catatan']) ?></td>
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
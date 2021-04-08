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

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-1">
                            <a id="cartButton" href="<?= base_url('admin/siswa') ?>" class="btn btn-lg btn-success">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
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
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Detail Siswa</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-12 col-sm-12 ">

                                        <div class="profile_title">
                                            <div class="col-md-6">
                                                <h2 class="text-uppercase">Info Siswa</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <form class="update-siswa" method="POST" action="">
                                                <!-- Material input -->
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" value="<?= $siswa['nama'] ?>" disabled id="nama" name="nama" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nis">NIS</label>
                                                    <input value="<?= $siswa['nis'] ?>" disabled type="text" id="nis" name="nis" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nisn">NISN</label>
                                                    <input value="<?= $siswa['nisn'] ?>" disabled type="text" id="nisn" name="nisn" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kelas">Kelas</label>
                                                    <input value="<?= $siswa['kelas'] ?>" disabled type="text" id="kelas" name="kelas" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="jurusan">Jurusan</label>
                                                    <input value="<?= $siswa['jurusan'] ?>" disabled type="text" id="jurusan" name="jurusan" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tahun_masuk">Tahun Masuk</label>
                                                    <input value="<?= $siswa['tahun_masuk'] ?>" disabled type="text" id="tahun_masuk" name="tahun_masuk" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <br>
                                                    <button class="btn btn-sm <?= $siswa['status'] ? 'btn-success' : 'btn-danger' ?>" disabled><?= $siswa['status'] ? 'Aktif' : 'Non-Aktif' ?></button>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="tahun_lulus">Tahun Lulus</label>
                                                    <input value="<?= $siswa['tahun_lulus'] ?>" disabled type="text" id="tahun_lulus" name="tahun_lulus" class="form-control">
                                                </div> -->
                                                <!-- <div class="form-group">
                                                    <label for="cash">Cash</label>
                                                    <input value="<?= $siswa['cash'] ?>" disabled type="text" id="cash" name="cash" class="form-control">
                                                </div> -->
                                                <div class="form-inline d-flex mt-3">
                                                    <button type="button" class="btn btn-secondary btn-edit" id="cancel" style="display: none;">
                                                        <i class="fa fa-back" aria-hidden="true"></i> Cancel
                                                    </button>
                                                    <button type="button" id="edit" class="btn btn-success btn-edit">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                                    </button>
                                                    <button id="simpan" type="submit" name="simpan" value="1" class="btn btn-success ml-3" style="display: none;">
                                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                                                    </button>

                                                    <button type="button" class="btn btn-danger ml-auto" id="non-aktif" style="display: none;" data-toggle="modal" data-target="#nonAktif">Non-Aktifkan Siswa</button>

                                                    <div class="modal fade" id="nonAktif" tabindex="-1" role="dialog" aria-labelledby="nonAktifLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="nonAktifLabel">Apakah anda yakin?</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Siswa ini akan di non-aktifkan dan tidak akan muncul di list pembayaran</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="<?= base_url('admin/siswa/nonAktifkanSiswa/') . $siswa['id'] ?>" class="btn btn-danger">Non-Aktifkan!</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Detail Transaksi</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div class="profile_title">
                                        <div class="col-md-6">
                                            <h2 class="text-uppercase">Info Siswa</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
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
                                                            <button type="button" class="btn btn btn-danger" data-toggle="modal" data-target="#hapusdata"><i class="fa fa-trash"></i></button>

                                                            <!-- modal -->
                                                            <div class="modal fade" id="hapusdata" tabindex="-1" role="dialog" aria-labelledby="hapusdataLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="hapusdataLabel">Apakah anda yakin?</h5>
                                                                            <a href="<?= base_url('admin/uang_keluar/hapustransaksi/') . $d['id_transaksi'] ?>" class="btn btn-danger ml-auto">Hapus</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <a target="_blank" href="<?= base_url('admin/transaksi/print/' . $item['kode_transaksi']) ?>" class="btn btn-primary">
                                                                <i class="fa fa-print" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="<?= base_url('admin/transaksi/success/' . $item['kode_transaksi']) ?>" class="btn btn-dark">
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
        <?php $this->load->view('admin/template/footer') ?>

</body>

</html>

<script>
    $(".btn-edit").click(function() {
        var input = $('.update-siswa .form-group input')
        input.prop("disabled", !input.prop("disabled"))
        $('#simpan').show()
        $('#cancel').show()
        $('#non-aktif').show()
        $('#edit').hide()
    })
    $("#cancel").click(function() {
        var input = $('.update-siswa .form-group input')
        input.prop("disabled", 1)
        $('#simpan').hide()
        $('#cancel').hide()
        $('#non-aktif').hide()
        $('#edit').show()
    })
</script>
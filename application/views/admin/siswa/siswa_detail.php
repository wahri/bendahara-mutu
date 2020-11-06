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

                    <div class="row mt-2">
                        <div class="col-md-8">
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
                                        <div class="col-12 col-md-12 mt-3">
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
                                                    <label for="tahun_masuk">Tahun Masuk</label>
                                                    <input value="<?= $siswa['tahun_masuk'] ?>" disabled type="text" id="tahun_masuk" name="tahun_masuk" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tahun_lulus">Tahun Lulus</label>
                                                    <input value="<?= $siswa['tahun_lulus'] ?>" disabled type="text" id="tahun_lulus" name="tahun_lulus" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cash">Cash</label>
                                                    <input value="<?= $siswa['cash'] ?>" disabled type="text" id="cash" name="cash" class="form-control">
                                                </div>
                                                <div class="form-inline mt-3">
                                                    <button type="button" class="btn btn-success btn-edit">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                                    </button>
                                                    <button type="submit" class="btn btn-success ml-3">
                                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
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

    })
</script>
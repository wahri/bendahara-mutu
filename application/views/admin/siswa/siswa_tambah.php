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

                        <div class="col-8">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tambah Siswa</h2>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <label for="nama">Nama Siswa</label>
                                                    <input id="nama" name="nama" type="text" class="form-control"></div>
                                                <div class="form-group">
                                                    <label for="nis">NIS</label><input id="nis" name="nis" type="text" class="form-control"></div>
                                                <div class="form-group"><label for="nisn">NISN</label><input id="nisn" type="text" name="nisn" class="form-control"></div>
                                                <div class="form-group"><label for="kelas">Kelas</label><input id="kelas" type="text" name="kelas" class="form-control"></div>
                                                <div class="form-group"><label for="tahun_masuk">Tahun Masuk</label><input id="tahun_masuk" name="tahun_masuk" type="text" class="form-control"></div>
                                                <div class="form-group"><label for="tahun_lulus">Tahun Lulus</label><input name="tahun_lulus" id="tahun_lulus" type="text" class="form-control"></div>
                                                <div class="form-group">
                                                    <button class="btn btn-success">
                                                        Submit
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
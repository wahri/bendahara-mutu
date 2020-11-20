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
                            <a id="cartButton" href="<?= base_url('admin/pengaturan') ?>" class="btn btn-lg btn-success">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row mt-2">
                        <div class="col-md-8">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Ganti Password</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <label for="password_lama">Password Lama</label>
                                                    <input type="password" name="password_lama" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password_baru">Password Baru</label>
                                                    <input type="password" name="password_baru" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password_lama">Confirm Password</label>
                                                    <input type="password" name="password_lama" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-success">
                                                        Simpan
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


            <!-- /page content -->
            <?php $this->load->view('admin/template/footer') ?>

</body>


</html>
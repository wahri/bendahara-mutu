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
                            <h3>User Management</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="x_title"></div>


                    <?php if (!empty($this->session->flashdata('message'))) : ?>
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            Pesan..!!</strong> <?php echo $this->session->flashdata('message'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($this->session->flashdata('message_error'))) : ?>
                        <div class="alert alert-error alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            Pesan..!!</strong> <?php echo $this->session->flashdata('message_error'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            </br>
                            <div class="x_content">
                                <form action="" method="post">

                                    <div class="form-group">
                                        <label>Username <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="username" value="<?= set_value('username') ?>" required>
                                        <small class="text-danger"><?= form_error('username') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label>Level <span class="required">*</span></label>
                                        <div class="radio">
                                            <label for="level">
                                                <input type="radio" name="level" value="1" class="flat"> Superadmin
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="level">
                                                <input type="radio" name="level" value="2" class="flat"> Kepala Sekolah
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="level">
                                                <input type="radio" name="level" value="3" class="flat"> Bendahara
                                            </label>
                                        </div>
                                        <small class="text-danger"><?= form_error('level') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="password" class="form-control" name="password" value="<?= set_value('password') ?>" required>
                                        <small class="text-danger"><?= form_error('password') ?></small>

                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password <span class="required">*</span></label>
                                        <input type="password" class="form-control" name="password_confirm" value="<?= set_value('password_confirm') ?>" required>

                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Tambah Pengguna</button>
                                    </div>
                                </form>

                            </div>


                        </div>

                        <div class="col-md-8 col-sm-8 col-xs-12">

                            <div class="x_panel">
                                <div class="x_content">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Level</th>
                                                <th>Username</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodySearch">
                                            <?php foreach ($user as $u) : ?>
                                                <tr>
                                                    <td><?= $u['level'] == 1 ? 'Superadmin' : ($u['level'] == 2 ? 'Kepsek' : ($u['level'] == 3 ? 'Bendahara' : '')) ?></td>
                                                    <td><?= $u['username'] ?></td>
                                                    <td class="text-center">
                                                        <?php if ($u['active']) : ?>
                                                            <a class="badge badge-primary" href="<?= base_url('admin/user/set_status/') . $u['id'] ?>" data-toggle="tooltip" data-placement="left" title="Klik untuk me non aktifkan">Active</a>

                                                        <?php else : ?>
                                                            <a class="badge badge-danger" href="<?= base_url('admin/user/set_status/') . $u['id'] ?>" data-toggle="tooltip" data-placement="left" title="Klik untuk mengaktifkan">Inactive</a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('admin/user/edit/') . $u['id'] ?>" class="btn btn-sm btn-round btn-info">Edit</a>
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
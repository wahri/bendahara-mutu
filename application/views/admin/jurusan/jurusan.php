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

          <div class="row mt-3">

            <div class="col-8">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Pengelolaan Data Jurusan</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-4">
                      <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-plus" aria-hidden="true"></i> Jurusan</button>
                    </div>
                  </div>
                  <div class="row mt-1">
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

                  <div class="row mt-1">
                    <div class="col-12">
                      <table id="dataSiswa" style="width: 100%;" class="table table-striped">
                        <thead class="thead-darkblue">
                          <tr>
                            <th class="text-center">Nama Jurusan</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php foreach ($jurusan as $j) : ?>
                            <tr>
                              <td class="text-center"><?= $j['nama_jurusan'] ?></td>
                              <td class="text-center">

                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editJurusan<?= $j['id_jurusan'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>

                                <div class="modal fade" id="editJurusan<?= $j['id_jurusan'] ?>" tabindex="-1" role="dialog" aria-labelledby="editJurusan<?= $j['id_jurusan'] ?>Label" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="editJurusanLabel">Tambah Jurusan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form method="POST" action="">
                                        <div class="modal-body">
                                          <div class="form-group">
                                            <label for="jurusan" class="col-form-label">Nama Jurusan:</label>
                                            <input type="text" name="nama_jurusan" value="<?= $j['nama_jurusan'] ?>" class="form-control" id="jurusan">
                                          </div>
                                            <input type="hidden" name="id_jurusan" value="<?= $j['id_jurusan'] ?>" class="form-control" id="jurusan">
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" name="edit_jurusan" value="1" class="btn btn-success">Edit</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>

                                <button type="button" class="btn btn btn-danger" data-toggle="modal" data-target="#hapusdata"><i class="fa fa-trash" aria-hidden="true"></i></button>

                                <!-- modal -->
                                <div class="modal fade" id="hapusdata" tabindex="-1" role="dialog" aria-labelledby="hapusdataLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="hapusdataLabel">Apakah anda yakin?</h5>
                                        <a href="<?= base_url('admin/jurusan/hapusjurusan/') . $j['id_jurusan'] ?>" class="btn btn-danger ml-auto">Hapus</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
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
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="">
          <div class="modal-body">
            <div class="form-group">
              <label for="jurusan" class="col-form-label">Nama Jurusan:</label>
              <input type="text" name="nama_jurusan" class="form-control" id="jurusan">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="tambah_jurusan" value="1" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php $this->load->view('admin/template/footer') ?>

</body>

</html>
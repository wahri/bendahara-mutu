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

                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <table id="dataSiswa" style="width: 100%;" class="table table-striped">
                                                <thead class="thead-darkblue">
                                                    <tr>
                                                        <th class="text-center">Nama Jurusan</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                   <tr>
                                                       <td class="text-center">Teknik Komputer dan Jaringan</td>
                                                       <td class="text-center">
                                                            <a href="" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                           <a href="" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="jurusan" class="col-form-label">Nama Jurusan:</label>
            <input type="text" name="jurusan" class="form-control" id="jurusan">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Submit</button>
      </div>
    </div>
  </div>
</div>

    <?php $this->load->view('admin/template/footer') ?>
    
</body>

</html>
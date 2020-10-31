<?php $this->load->view('bendahara/template/header') ?>

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php $this->load->view('bendahara/template/sidebar') ?>

      <?php $this->load->view('bendahara/template/topbar') ?>

      <!-- page content -->
      <div class="right_col">
        <div class="row mt-3">

          <div class="col-1">
            <a id="cartButton" href="<?= base_url('bendahara/pembayaran') ?>" class="btn btn-lg btn-success">
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
          </div>

          <div class="col-1 offset-8 offset-lg-9">
            <a id="cartButton" href="<?= base_url('bendahara/transaksi/log/') . $siswa['nis'] ?>" class="btn btn-lg btn-success">
              <i class="fa fa-file-text" aria-hidden="true"></i>
            </a>
          </div>

          <?php if (!empty($siswa)) : ?>
            <div class="col-1 offset-1 offset-sm-0">
              <button id="cartButton" type="button" data-toggle="modal" data-target="#cartModal" class="btn btn-lg btn-success info-number">
                <i class="fa fa-shopping-cart">
                </i>
                <span class="badge bg-primary">6</span>
              </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form method="POST" id="confirmCartForm">
                    <div class="modal-header">
                      <h5 class="modal-title" id="cartModalLabel">Cart</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>


                    <div class="modal-body" id="cart">
                      <div class="row item justify-content-between">
                        <div class="col-4 item-name ">
                          asdas
                        </div>
                        <div class="col-4 text-center">
                          <span class="badge mr-2 item-price badge-pill badge-success">
                            Rp.12121
                          </span>
                          <button data-id="${data[i].id}" class="btn btn-danger hapusCart">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </button>
                        </div>
                      </div>
                      <input type="hidden" value="${data[i].nominal}" name="nominal[]"></input>
                      <input type="hidden" value="${data[i].id_tagihan}" name="id_tagihan[]"></input>
                    </div>

                    <div class="row total justify-content-start">
                      <div class="col-4">
                        <span class="badge item-price badge-pill badge-primary">
                          Total : Rp. 121212
                        </span>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" id="confirmCart" class="btn btn-primary">Konfirmasi</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php endif; ?>

        </div>
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="x_panel">

              <div class="x_title">
                <h2>Data Siswa</h2>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">
                <div class="row">
                  <div class="col-4"> <img src="<?= base_url('assets/img/siswa.png') ?>" alt="..." class="img-thumbnail img-fluid"></div>
                  <div class="col-8 d-flex flex-column justify-content-center">
                    <ul style="list-style: none;">
                      <li>
                        <h2>Nama Siswa :</h2>
                        <h2 class="text-success"> <?= $siswa['nama'] ?></h2>
                      </li>
                      <li class="mt-3">
                        <h2>NIS :</h2>
                        <h2 class="text-primary"> <?= $siswa['nis'] ?></h2>
                      </li>
                      <li class="mt-3">
                        <h2>NISN :</h2>
                        <h2 class="text-primary"> <?= $siswa['nisn'] ?></h2>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Data Pembayaran</h2>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">
                <div class="row">
                  <div class="col-md-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-spp-tab" data-toggle="pill" href="#pills-spp" role="tab" aria-controls="pills-spp" aria-selected="false">SPP</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-kat-tab" data-toggle="pill" href="#pills-kat" role="tab" aria-controls="pills-kat" aria-selected="true">KAT</a>
                      </li>

                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-lainnya-tab" data-toggle="pill" href="#pills-lainnya" role="tab" aria-controls="pills-lainnya" aria-selected="false">LAINNYA</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-spp" role="tabpanel" aria-labelledby="pills-spp-tab">
                    <form class="form-inline" action="">
                      <label class="mr-3">Pilih Periode</label>
                      <select class="selectpicker" onchange="location = this.value;">
                        <option value="1">2323</option>
                      </select>
                    </form>

                    <table class="table table-striped projects mt-3">
                      <thead>
                        <tr>
                          <th style="width: 20%">Nama Tagihan</th>
                          <th>Jumlah Tagihan</th>
                          <th>Jumlah Dibayar</th>
                          <th>Status</th>
                          <th style="width: 20%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td><button type="button" class="btn btn-danger btn-xs">Terhutang</button></td>
                          <td>5</td>
                        </tr>

                      </tbody>
                    </table>
                  </div>

                  <div class="tab-pane fade" id="pills-kat" role="tabpanel" aria-labelledby="pills-kat-tab">
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 20%">Nama Tagihan</th>
                          <th>Jumlah Tagihan</th>
                          <th>Jumlah Dibayar</th>
                          <th>Status</th>
                          <th style="width: 20%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            Uang KAT
                          </td>
                          <td>
                            Rp.1.000.000,-
                          </td>
                          <td>
                            Rp.500.000,-
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger btn-sm">Terhutang</button>
                          </td>
                          <td width="30%">

                          </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>



                  <div class="tab-pane fade" id="pills-lainnya" role="tabpanel" aria-labelledby="pills-lainnya-tab">
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 20%">Nama Tagihan</th>
                          <th>Jumlah Tagihan</th>
                          <th>Jumlah Dibayar</th>
                          <th>Status</th>
                          <th style="width: 20%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            Uang Prakerin
                          </td>
                          <td>
                            Rp.1.000.000,-
                          </td>
                          <td>
                            Rp.500.000,-
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger btn-xs">Terhutang</button>
                          </td>
                          <td>
                            <button type="button" data-toggle="modal" data-target="#bayarModal" class="btn btn-success btn-xs"><i class="fa fa-money"></i> Bayar
                            </button>
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
      <!-- /page content -->

      <?php $this->load->view('bendahara/template/footer') ?>
</body>

<!-- membuat format rupiah -->
<script>
  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return rupiah;
  }

  var elements = document.getElementById("rupiah");
  elements.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, 'Rp. ');
  });
</script>

</html>
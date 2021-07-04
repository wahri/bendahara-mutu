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

          <div class="col-1 offset-1 offset-sm-0">
            <button id="cartButton" type="button" data-toggle="modal" data-target="#cartModal" class="btn btn-lg btn-success info-number">
              <i class="fa fa-shopping-cart">
              </i>
              <?php
              if ($notif_cart > 0) :
              ?>
                <span class="badge bg-primary"><?= $notif_cart ?></span>
              <?php endif; ?>
            </button>
          </div>
        </div>
        <div class="row mb-1">
          <div class="col-md-12">
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
        <div class="row">
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
                      <li class="mt-3">
                        <h2>Kelas :</h2>
                        <h2 class="text-primary"> <?= $siswa['kelas'] != 13 ? $siswa['kelas'] : 'Alumni' ?></h2>
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
                      <!-- <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-kat-tab" data-toggle="pill" href="#pills-kat" role="tab" aria-controls="pills-kat" aria-selected="true">KAT</a>
                      </li> -->

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
                        <?php
                        // Sets the top option to be the current year. (IE. the option that is chosen by default).
                        $currently_selected = date('Y');
                        // Year to start available options at
                        $earliest_year = $siswa['tahun_masuk'];
                        // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
                        // $latest_year = $siswa['tahun_masuk'] + 2;
                        if (empty($siswa['tahun_lulus'])) {
                          $latest_year = $siswa['kelas'] == 10 ? date('Y') + 2 : ($siswa['kelas'] == 11 ? date('Y') + 1 : date('Y'));
                        } else {
                          $latest_year = $siswa['tahun_lulus'] - 1;
                        }
                        // Loops over each int[year] from current year, back to the $earliest_year [1950]
                        foreach (range($latest_year, $earliest_year) as $i) :
                          $j = $i + 1;
                        ?>
                          <option value="<?= base_url('bendahara/pembayaran/detail/') . $siswa['nis'] . '/' . $i ?>" <?= $i == $tahun ? 'selected' : '' ?>><?= $i . ' ~ ' . $j ?></option>
                        <?php endforeach; ?>
                      </select>
                    </form>



                    <table class="table table-striped projects mt-3" id="datatable">
                      <thead class="thead-darkblue">
                        <tr>
                          <th style="width: 20%">Nama Tagihan</th>
                          <th>Jumlah Tagihan</th>
                          <th>Jumlah Dibayar</th>
                          <th class="text-center">Status</th>
                          <th style="width: 20%" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $ganjil = [7 => "Juli", 8 => "Agustus", 9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember"];
                        $genap = [1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April", 5 => "Mei", 6 => "Juni"];
                        ?>

                        <tr>
                          <th colspan="5">Semester Ganjil</th>
                        </tr>

                        <?php
                        foreach ($ganjil as $k => $d) :
                          $cek = $this->db->get_where('tagihan', ['nis' => $siswa['nis'], 'tahun' => $tahun, 'bulan' => $k, 'kode_tagihan' => 1])->row_array();
                          if (!empty($cek)) {
                            $cek_cart = $this->db->get_where('cart', ['nis' => $siswa['nis'], 'id_tagihan' => $cek['id_tagihan']])->row_array();
                          }
                        ?>
                          <tr>
                            <td>
                              SPP <?= $d . ' ' . $tahun ?>
                            </td>
                            <td>
                              Rp. <?= number_format($siswa['spp'], 0, ',', '.') ?>
                            </td>
                            <td>
                              <?php if (!empty($cek['jml_dibayar'])) : ?>
                                Rp. <?= number_format($cek['jml_dibayar'], 0, ',', '.') ?>
                              <?php else : ?>
                                Rp. 0
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <?php if ($cek['is_lunas']) : ?>
                                <button type="button" class="btn btn-info btn-xs">Lunas</button>
                              <?php else : ?>
                                <?php if (date('Y') > $tahun || (date('Y') == $tahun && date('m') >= $k)) : ?>
                                  <button type="button" class="btn btn-danger btn-xs">Terhutang</button>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <?php if (empty($cek)) : ?>
                                <button type="button" data-toggle="modal" data-target="#buatTagihan" data-nis="<?= $siswa['nis'] ?>" data-item="SPP <?= $d . ' ' . date('Y') ?>" data-harga="<?= $siswa['spp'] ?>" data-dibayar="<?= number_format($siswa['spp'], 0, ',', '.') ?>" data-tahun="<?= $tahun ?>" data-bulan="<?= $k ?>" data-kode="1" data-nama="SPP <?= $d . ' ' . ($tahun + 1) ?>" class="btn btn-success btn-xs" id="btnCart"><i class="fa fa-money"></i> Bayar
                                </button>
                              <?php else : ?>
                                <?php if (!$cek['is_lunas']) : ?>
                                  <?php
                                  $sisa_tagihan = $cek['harga'] - $cek['jml_dibayar'];
                                  if (empty($cek_cart)) :
                                  ?>
                                    <button type="button" data-toggle="modal" data-target="#bayarModal" data-nis="<?= $cek['nis'] ?>" data-item="<?= $cek['nama_tagihan'] ?>" data-id="<?= $cek['id_tagihan'] ?>" data-sisa="<?= number_format($sisa_tagihan, 0, ',', '.') ?>" class="btn btn-success btn-xs" id="btnCart"><i class="fa fa-money"></i> Bayar
                                    </button>
                                  <?php else : ?>
                                    <button id="cartButton" type="button" data-toggle="modal" data-target="#cartModal" class="btn btn-xs btn-info">
                                      <i class="fa fa-shopping-cart"></i> Checkout
                                    </button>
                                  <?php endif; ?>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>


                        <tr>
                          <th colspan="5">Semester Genap</th>
                        </tr>

                        <?php
                        foreach ($genap as $k => $d) :
                          $cek = $this->db->get_where('tagihan', ['nis' => $siswa['nis'], 'tahun' => ($tahun + 1), 'bulan' => $k, 'kode_tagihan' => 1])->row_array();
                          if (!empty($cek)) {
                            $cek_cart = $this->db->get_where('cart', ['nis' => $siswa['nis'], 'id_tagihan' => $cek['id_tagihan']])->row_array();
                          }
                        ?>
                          <tr>
                            <td>
                              SPP <?= $d . ' ' . ($tahun + 1) ?>
                            </td>
                            <td>
                              Rp. <?= number_format($siswa['spp'], 0, ',', '.') ?>
                            </td>
                            <td>
                              <?php if (!empty($cek['jml_dibayar'])) : ?>
                                Rp. <?= number_format($cek['jml_dibayar'], 0, ',', '.') ?>
                              <?php else : ?>
                                Rp. 0
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <?php if ($cek['is_lunas']) : ?>
                                <button type="button" class="btn btn-info btn-xs">Lunas</button>
                              <?php else : ?>
                                <?php if (date('Y') > ($tahun + 1) || (date('Y') == ($tahun + 1) && date('m') >= $k)) : ?>
                                  <button type="button" class="btn btn-danger btn-xs">Terhutang</button>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <?php if (empty($cek)) : ?>
                                <button type="button" data-toggle="modal" data-target="#buatTagihan" data-nis="<?= $siswa['nis'] ?>" data-item="SPP <?= $d . ' ' . date('Y') ?>" data-harga="<?= $siswa['spp'] ?>" data-dibayar="<?= number_format($siswa['spp'], 0, ',', '.') ?>" data-tahun="<?= ($tahun + 1) ?>" data-bulan="<?= $k ?>" data-kode="1" data-nama="SPP <?= $d . ' ' . ($tahun + 1) ?>" class="btn btn-success btn-xs" id="btnCart"><i class="fa fa-money"></i> Bayar
                                </button>
                              <?php else : ?>
                                <?php if (!$cek['is_lunas']) : ?>
                                  <?php
                                  $sisa_tagihan = $cek['harga'] - $cek['jml_dibayar'];
                                  if (empty($cek_cart)) :
                                  ?>
                                    <button type="button" data-toggle="modal" data-target="#bayarModal" data-nis="<?= $cek['nis'] ?>" data-item="<?= $cek['nama_tagihan'] ?>" data-id="<?= $cek['id_tagihan'] ?>" data-sisa="<?= number_format($sisa_tagihan, 0, ',', '.') ?>" class="btn btn-success btn-xs" id="btnCart"><i class="fa fa-money"></i> Bayar
                                    </button>
                                  <?php else : ?>
                                    <button id="cartButton" type="button" data-toggle="modal" data-target="#cartModal" class="btn btn-xs btn-info">
                                      <i class="fa fa-shopping-cart"></i> Checkout
                                    </button>
                                  <?php endif; ?>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>

                        <!-- 
                        <tr>
                          <th colspan="5">Semester Ganjil</th>
                        </tr>
                        <?php
                        foreach ($sem_ganjil as $ganjil) :
                          $cek_cart = $this->db->get_where('cart', ['nis' => $siswa['nis'], 'id_tagihan' => $ganjil['id_tagihan']])->row_array();
                          $sisa = $ganjil['harga'] - $ganjil['jml_dibayar'];
                        ?>
                          <tr>
                            <td><?= $ganjil['nama_tagihan'] ?></td>
                            <td>Rp. <?= number_format($ganjil['harga'], 0, ',', '.') ?></td>
                            <td>Rp. <?= number_format($ganjil['jml_dibayar'], 0, ',', '.') ?></td>
                            <td class="text-center">
                              <?php if ($ganjil['is_lunas']) : ?>
                                <button type="button" class="btn btn-success btn-xs">Lunas</button>
                              <?php else : ?>
                                <?php if (date('Y') > substr($ganjil['tahun'], 0, 4) || (date('Y') == substr($ganjil['tahun'], 0, 4) && date('m') >= $ganjil['bulan'])) : ?>
                                  <button type="button" class="btn btn-danger btn-xs">Terhutang</button>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <?php if (!$ganjil['is_lunas']) : ?>
                                <?php
                                if (empty($cek_cart)) :
                                ?>
                                  <button type="button" data-toggle="modal" data-target="#bayarModal" data-nis="<?= $ganjil['nis'] ?>" data-item="<?= $ganjil['nama_tagihan'] ?>" data-id="<?= $ganjil['id_tagihan'] ?>" data-sisa="<?= number_format($sisa, 0, ',', '.') ?>" class="btn btn-success btn-xs" id="btnCart"><i class="fa fa-money"></i> Bayar
                                  </button>
                                <?php else : ?>
                                  <button id="cartButton" type="button" data-toggle="modal" data-target="#cartModal" class="btn btn-xs btn-info">
                                    <i class="fa fa-shopping-cart"></i> Checkout
                                  </button>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                        <tr>
                          <th colspan="5">Semester Genap</th>
                        </tr>
                        <?php
                        foreach ($sem_genap as $genap) :
                          $cek_cart = $this->db->get_where('cart', ['nis' => $siswa['nis'], 'id_tagihan' => $genap['id_tagihan']])->row_array();
                          $sisa2 = $genap['harga'] - $genap['jml_dibayar'];
                        ?>
                          <tr>
                            <td><?= $genap['nama_tagihan'] ?></td>
                            <td>Rp. <?= number_format($genap['harga'], 0, ',', '.') ?></td>
                            <td>Rp. <?= number_format($genap['jml_dibayar'], 0, ',', '.') ?></td>
                            <td class="text-center">
                              <?php if ($genap['is_lunas']) : ?>
                                <button type="button" class="btn btn-success btn-xs">Lunas</button>
                              <?php else : ?>
                                <?php if (date('Y') > substr($genap['tahun'], 0, 4) + 1 || (date('Y') == substr($genap['tahun'], 0, 4) + 1  && date('m') >= $genap['bulan'])) : ?>
                                  <button type="button" class="btn btn-danger btn-xs">Terhutang</button>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <?php if (!$genap['is_lunas']) : ?>
                                <?php
                                if (empty($cek_cart)) :
                                ?>
                                  <button type="button" data-toggle="modal" data-target="#bayarModal" data-nis="<?= $genap['nis'] ?>" data-item="<?= $genap['nama_tagihan'] ?>" data-id="<?= $genap['id_tagihan'] ?>" data-sisa="<?= number_format($sisa2, 0, ',', '.') ?>" class="btn btn-success btn-xs" id="btnCart"><i class="fa fa-money"></i> Bayar
                                  </button>
                                <?php else : ?>
                                  <button id="cartButton" type="button" data-toggle="modal" data-target="#cartModal" class="btn btn-xs btn-info">
                                    <i class="fa fa-shopping-cart"></i> Checkout
                                  </button>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?> -->
                      </tbody>
                    </table>

                    <!-- <table class="table table-striped projects mt-3" id="datatable">
                      <thead class="thead-darkblue">
                        <tr>
                          <th style="width: 20%">Nama Tagihan</th>
                          <th>Jumlah Tagihan</th>
                          <th>Jumlah Dibayar</th>
                          <th class="text-center">Status</th>
                          <th style="width: 20%" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th colspan="5">Semester Ganjil</th>
                        </tr>
                        <?php
                        foreach ($sem_ganjil as $ganjil) :
                          $cek_cart = $this->db->get_where('cart', ['nis' => $siswa['nis'], 'id_tagihan' => $ganjil['id_tagihan']])->row_array();
                          $sisa = $ganjil['harga'] - $ganjil['jml_dibayar'];
                        ?>
                          <tr>
                            <td><?= $ganjil['nama_tagihan'] ?></td>
                            <td>Rp. <?= number_format($ganjil['harga'], 0, ',', '.') ?></td>
                            <td>Rp. <?= number_format($ganjil['jml_dibayar'], 0, ',', '.') ?></td>
                            <td class="text-center">
                              <?php if ($ganjil['is_lunas']) : ?>
                                <button type="button" class="btn btn-success btn-xs">Lunas</button>
                              <?php else : ?>
                                <?php if (date('Y') > substr($ganjil['tahun'], 0, 4) || (date('Y') == substr($ganjil['tahun'], 0, 4) && date('m') >= $ganjil['bulan'])) : ?>
                                  <button type="button" class="btn btn-danger btn-xs">Terhutang</button>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <?php if (!$ganjil['is_lunas']) : ?>
                                <?php
                                if (empty($cek_cart)) :
                                ?>
                                  <button type="button" data-toggle="modal" data-target="#bayarModal" data-nis="<?= $ganjil['nis'] ?>" data-item="<?= $ganjil['nama_tagihan'] ?>" data-id="<?= $ganjil['id_tagihan'] ?>" data-sisa="<?= number_format($sisa, 0, ',', '.') ?>" class="btn btn-success btn-xs" id="btnCart"><i class="fa fa-money"></i> Bayar
                                  </button>
                                <?php else : ?>
                                  <button id="cartButton" type="button" data-toggle="modal" data-target="#cartModal" class="btn btn-xs btn-info">
                                    <i class="fa fa-shopping-cart"></i> Checkout
                                  </button>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                        <tr>
                          <th colspan="5">Semester Genap</th>
                        </tr>
                        <?php
                        foreach ($sem_genap as $genap) :
                          $cek_cart = $this->db->get_where('cart', ['nis' => $siswa['nis'], 'id_tagihan' => $genap['id_tagihan']])->row_array();
                          $sisa2 = $genap['harga'] - $genap['jml_dibayar'];
                        ?>
                          <tr>
                            <td><?= $genap['nama_tagihan'] ?></td>
                            <td>Rp. <?= number_format($genap['harga'], 0, ',', '.') ?></td>
                            <td>Rp. <?= number_format($genap['jml_dibayar'], 0, ',', '.') ?></td>
                            <td class="text-center">
                              <?php if ($genap['is_lunas']) : ?>
                                <button type="button" class="btn btn-success btn-xs">Lunas</button>
                              <?php else : ?>
                                <?php if (date('Y') > substr($genap['tahun'], 0, 4) + 1 || (date('Y') == substr($genap['tahun'], 0, 4) + 1  && date('m') >= $genap['bulan'])) : ?>
                                  <button type="button" class="btn btn-danger btn-xs">Terhutang</button>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                            <td class="text-center">
                              <?php if (!$genap['is_lunas']) : ?>
                                <?php
                                if (empty($cek_cart)) :
                                ?>
                                  <button type="button" data-toggle="modal" data-target="#bayarModal" data-nis="<?= $genap['nis'] ?>" data-item="<?= $genap['nama_tagihan'] ?>" data-id="<?= $genap['id_tagihan'] ?>" data-sisa="<?= number_format($sisa2, 0, ',', '.') ?>" class="btn btn-success btn-xs" id="btnCart"><i class="fa fa-money"></i> Bayar
                                  </button>
                                <?php else : ?>
                                  <button id="cartButton" type="button" data-toggle="modal" data-target="#cartModal" class="btn btn-xs btn-info">
                                    <i class="fa fa-shopping-cart"></i> Checkout
                                  </button>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table> -->
                  </div>

                  <div class="tab-pane fade" id="pills-lainnya" role="tabpanel" aria-labelledby="pills-lainnya-tab">
                    <table class="table table-striped projects">
                      <thead class="thead-darkblue">
                        <tr>
                          <th style="width: 20%">Nama Tagihan</th>
                          <th>Jumlah Tagihan</th>
                          <th>Jumlah Dibayar</th>
                          <th>Status</th>
                          <th style="width: 20%">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        foreach ($uang_lainnya as $d) :
                          $cek = $this->db->get_where('tagihan', ['nis' => $siswa['nis'], 'kode_tagihan' => $d['kode_tagihan']])->row_array();

                          $cek_cart = $this->db->get_where('cart', ['nis' => $siswa['nis'], 'id_tagihan' => $cek['id_tagihan']])->row_array();
                        ?>
                          <?php if (empty($cek)) : ?>
                            <tr>
                              <td>
                                <?= $d['nama_tagihan'] ?>
                              </td>
                              <td>
                                Rp. <?= number_format($d['harga'], 0, ',', '.') ?>
                              </td>
                              <td>
                                Rp. 0
                              </td>
                              <td>
                                <button type="button" class="btn btn-danger btn-xs">Terhutang</button>
                              </td>
                              <td>
                                <button type="button" data-toggle="modal" data-target="#buatTagihan" data-nis="<?= $siswa['nis'] ?>" data-item="<?= $d['nama_tagihan'] ?>" data-harga="<?= $d['harga'] ?>" data-dibayar="<?= number_format($d['harga'], 0, ',', '.') ?>" data-kode="<?= $d['kode_tagihan'] ?>" data-nama="<?= $d['nama_tagihan'] ?>" class="btn btn-success btn-xs" id="btnCart"><i class="fa fa-money"></i> Bayar
                                </button>
                              </td>
                            </tr>
                          <?php else : ?>
                            <tr>
                              <td>
                                <?= $d['nama_tagihan'] ?>
                              </td>
                              <td>
                                Rp. <?= number_format($d['harga'], 0, ',', '.') ?>
                              </td>
                              <td>
                                Rp. <?= number_format($cek['jml_dibayar'], 0, ',', '.') ?>
                              </td>
                              <td>
                                <?php if ($cek['is_lunas']) : ?>
                                  <button type="button" class="btn btn-info btn-xs">Lunas</button>
                                <?php else : ?>
                                  <button type="button" class="btn btn-danger btn-xs">Terhutang</button>
                                <?php endif; ?>
                              </td>
                              <td>
                                <?php if (!$cek['is_lunas']) : ?>
                                  <?php
                                  $sisa_tagihan = $cek['harga'] - $cek['jml_dibayar'];
                                  if (empty($cek_cart)) :
                                  ?>
                                    <button type="button" data-toggle="modal" data-target="#bayarModal" data-nis="<?= $cek['nis'] ?>" data-item="<?= $cek['nama_tagihan'] ?>" data-id="<?= $cek['id_tagihan'] ?>" data-sisa="<?= number_format($sisa_tagihan, 0, ',', '.') ?>" class="btn btn-success btn-xs" id="btnCart"><i class="fa fa-money"></i> Bayar
                                    </button>
                                  <?php else : ?>
                                    <button id="cartButton" type="button" data-toggle="modal" data-target="#cartModal" class="btn btn-xs btn-info">
                                      <i class="fa fa-shopping-cart"></i> Checkout
                                    </button>
                                  <?php endif; ?>
                                <?php endif; ?>
                              </td>
                            </tr>

                          <?php endif; ?>
                        <?php endforeach; ?>
                      </tbody>



                      <!-- <tbody>
                        <?php
                        foreach ($uang_lainnya as $u) :
                          $sisa_l = $u['harga'] - $u['jml_dibayar'];
                          $cek_cart = $this->db->get_where('cart', ['nis' => $siswa['nis'], 'id_tagihan' => $u['id_tagihan']])->row_array();
                        ?>

                          <tr>
                            <td>
                              <?= $u['nama_tagihan'] ?>
                            </td>
                            <td>
                              Rp. <?= number_format($u['harga'], 0, ',', '.') ?>
                            </td>
                            <td>
                              Rp. <?= number_format($u['jml_dibayar'], 0, ',', '.') ?>
                            </td>
                            <td>
                              <?php if ($u['is_lunas']) : ?>
                                <button type="button" class="btn btn-info btn-xs">Lunas</button>
                              <?php else : ?>
                                <button type="button" class="btn btn-danger btn-xs">Terhutang</button>
                              <?php endif; ?>
                            </td>
                            <td>
                              <?php if (!$u['is_lunas']) : ?>
                                <?php
                                if (empty($cek_cart)) :
                                ?>
                                  <button type="button" data-toggle="modal" data-target="#bayarModal" data-nis="<?= $u['nis'] ?>" data-item="<?= $u['nama_tagihan'] ?>" data-id="<?= $u['id_tagihan'] ?>" data-sisa="<?= number_format($sisa_l, 0, ',', '.') ?>" class="btn btn-success btn-xs" id="btnCart"><i class="fa fa-money"></i> Bayar
                                  </button>
                                <?php else : ?>
                                  <button id="cartButton" type="button" data-toggle="modal" data-target="#cartModal" class="btn btn-xs btn-info">
                                    <i class="fa fa-shopping-cart"></i> Checkout
                                  </button>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>

                      </tbody> -->
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
      <!-- /page content -->

      <!-- Modal -->
      <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="cartModalLabel">Cart</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="<?= base_url('bendahara/pembayaran/confirmpembayaran/') . $siswa['nis'] ?>" method="POST">

              <div class="modal-body" id="cart">
                <?php if (empty($cart)) : ?>
                  <h2 class="text-center">Cart Kosong</h2>
                <?php else : ?>
                  <table class="table">
                    <thead>
                      <th>Item</th>
                      <th>Nominal</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($cart as $c) :
                      ?>
                        <tr>
                          <td> <?= $c['item'] ?></td>
                          <td><?= 'Rp.' . number_format($c['nominal'], 2, ',', '.') ?></td>
                          <td> <a href="<?= base_url('bendahara/pembayaran/hapuscart/') . $siswa['nis'] . '/' . $c['id_tagihan'] ?>" class="btn btn-danger hapusCart">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </a></td>
                        </tr>
                        <input type="hidden" value="<?= $c['nominal'] ?>" name="nominal[]"></input>
                        <input type="hidden" value="<?= $c['id_tagihan'] ?>" name="id_tagihan[]"></input>

                      <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                      <tr>
                        <td class="font-weight-bold">Total:</td>
                        <td class="font-weight-bold" colspan="2"><?= 'Rp.' . number_format($total_cart['nominal'], 2, ',', '.') ?></td>
                      </tr>
                    </tfoot>
                  </table>
                  <!-- <div class="row total">
                    <div class=" col-4">
                      <span class="badge item-price badge-pill badge-primary">
                        Total : Rp. <?= number_format($total_cart['nominal'], 2, ',', '.') ?>
                      </span>
                    </div>
                  </div> -->
                <?php endif; ?>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Konfirmasi</button>
              </div>

            </form>

          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="bayarModal" tabindex="-1" aria-labelledby="bayarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="bayarModalLabel">Masukkan Nominal Pembayaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url('bendahara/pembayaran/tambahcart') ?>" method="POST">
              <div class="modal-body">
                <input type="hidden" class="form-control" name="nisToCart" id="nisToCart">
                <input type="hidden" class="form-control" name="itemToCart" id="itemToCart">
                <input type="hidden" class="form-control" name="idTagihanToCart" id="idTagihanToCart">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                  </div>
                  <input type="text" class="form-control" id='rupiah' name="nominalToCart">
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add To Cart</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="buatTagihan" tabindex="-1" aria-labelledby="buatTagihanLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="buatTagihanLabel">Masukkan Nominal Pembayaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url('bendahara/pembayaran/buatTagihan') ?>" method="POST">
              <div class="modal-body">
                <input type="hidden" class="form-control" name="nis" id="nis">
                <input type="hidden" class="form-control" name="harga" id="harga">
                <input type="hidden" class="form-control" name="tahun" id="tahun">
                <input type="hidden" class="form-control" name="bulan" id="bulan">
                <input type="hidden" class="form-control" name="kode" id="kode">
                <input type="hidden" class="form-control" name="nama" id="nama">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                  </div>
                  <input type="text" class="form-control" id='rupiahs' name="nominalToCart">
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add To Cart</button>
              </div>
            </form>
          </div>
        </div>
      </div>

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

<script>
  $('#bayarModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var nis = button.data('nis')
    var item = button.data('item')
    var id_tagihan = button.data('id')
    var sisa = button.data('sisa')


    var modal = $(this)
    modal.find('.modal-body #nisToCart').val(nis)
    modal.find('.modal-body #itemToCart').val(item)
    modal.find('.modal-body #idTagihanToCart').val(id_tagihan)
    modal.find('#rupiah').val(sisa)
  })

  $('#buatTagihan').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var nis = button.data('nis')
    var item = button.data('item')
    var harga = button.data('harga')
    var dibayar = button.data('dibayar')
    var tahun = button.data('tahun')
    var bulan = button.data('bulan')
    var kode = button.data('kode')
    var nama = button.data('nama')


    var modal = $(this)
    modal.find('.modal-body #nis').val(nis)
    modal.find('.modal-body #item').val(item)
    modal.find('.modal-body #harga').val(harga)
    modal.find('.modal-body #tahun').val(tahun)
    modal.find('.modal-body #bulan').val(bulan)
    modal.find('.modal-body #kode').val(kode)
    modal.find('.modal-body #nama').val(nama)
    modal.find('#rupiahs').val(dibayar)
  })
</script>

</html>
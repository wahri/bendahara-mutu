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
                            <h3>Form Upload </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Upload Data Siswa</h2>
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
                                    <form action="<?= base_url('admin/siswa/importdatasiswates') ?>" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group border border-info p-3">
                                                    <label for="file">Upload data siswa</label>
                                                    <input type="file" name="file" class="form-control-file">
                                                    <!-- <p class="text-danger mt-2">Error</p> -->
                                                </div>
                                                <div class="form-row mt-3">
                                                    <div class="form-group col-md-6">
                                                        <label for="uang_kat">Uang KAT</label>
                                                        <div class="input-group flex-nowrap">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp</span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="0" name="kat" id="kat">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="uang_spp">Uang SPP</label>
                                                        <div class="input-group flex-nowrap">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp</span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="0" name="spp" id="spp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-sm mt-2">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Pengelolaan Data Siswa</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <form class="form-naik-kelas" action="#" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-inline mx-4 mb-4">
                                                    <label for="filter-siswa">Filter Siswa</label>
                                                    <select class="custom-select ml-2" id="filter-siswa">
                                                        <option value="">Pilih Kelas</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="Alumni">Alumni</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-4 text-right offset-4">
                                                <button type="button" data-toggle="modal" data-target="#naik-kelas-modal" class="btn btn-sm btn-success">
                                                    <i class="fa fa-arrow-up" aria-hidden="true"></i> Naik Kelas
                                                </button>
                                                <a href="<?= base_url('admin/siswa/tambah') ?>" class="btn btn-sm btn-success">
                                                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah Siswa
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <table id="dataSiswa" style="width: 100%;" class="table table-striped">
                                                <thead class="thead-darkblue">
                                                    <tr>
                                                        <th width="10%"><button type="button" class="btn btn-sm btn-dark" id="checkAll"><i class="fa fa-check" aria-hidden="true"></i></button></th>
                                                        <th width="10%">Nama</th>
                                                        <th width="10%">NIS</th>
                                                        <th width="10%">NISN</th>
                                                        <th width="10%">Kelas</th>
                                                        <th width="10%">Tahun Masuk</th>
                                                        <th width="10%">Tahun Lulus</th>
                                                        <th width="20%">Cash</th>
                                                        <th width="10%">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach ($siswa as $s) : ?>
                                                        <tr>
                                                            <td><input type="checkbox" name="id_siswa" class="id_siswa" value="<?= $s['id'] ?>"></td>
                                                            <td><?= $s['nama'] ?></td>
                                                            <td><?= $s['nis'] ?></td>
                                                            <td><?= $s['nisn'] ?></td>
                                                            <td><?= $s['kelas'] ?></td>
                                                            <td><?= $s['tahun_masuk'] ?></td>
                                                            <td><?= $s['tahun_lulus'] ?></td>
                                                            <td><?= $s['cash'] ?></td>
                                                            <td><a href="<?= base_url('admin/siswa/detail/') . $s['id'] ?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <!-- Modal -->
        <div class="modal fade" id="naik-kelas-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <div id="smartwizard">
                            <ul>
                                <li><a href="#step-1"><br /><small>Info</small></a></li>
                                <li><a href="#step-2"><br /><small>Pilih Siswa</small></a></li>
                                <li><a href="#step-3"><br /><small>Konfirmasi</small></a></li>
                            </ul>
                            <div>
                                <div id="step-1">
                                    <div class="row">
                                        <div class="col-10">
                                            <h4></h4>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-2">
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <table id="dataSiswa" style="width: 100%;" class="table table-striped">
                                                <thead class="thead-darkblue">
                                                    <tr>
                                                        <th width="10%"><button type="button" class="btn btn-sm btn-dark" disabled><i class="fa fa-check" aria-hidden="true"></i></button></th>
                                                        <th width="10%">Nama</th>
                                                        <th width="10%">NIS</th>
                                                        <th width="10%">NISN</th>
                                                        <th width="10%">Kelas</th>
                                                        <th width="10%">Tahun Masuk</th>
                                                        <th width="10%">Tahun Lulus</th>
                                                        <th width="20%">Cash</th>
                                                        <th width="10%">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td><input type="checkbox" checked disabled></td>
                                                        <td>Rizky</td>
                                                        <td>2155</td>
                                                        <td>0051518104</td>
                                                        <td>10</td>
                                                        <td>2018</td>
                                                        <td>Belum Lulus</td>
                                                        <td>Rp.100.000</td>
                                                        </td>
                                                        <td><button disabled class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" checked disabled></td>
                                                        <td>Ridho</td>
                                                        <td>2157</td>
                                                        <td>0051518105</td>
                                                        <td>10</td>
                                                        <td>2018</td>
                                                        <td>Belum Lulus</td>
                                                        <td>Rp.100.000</td>
                                                        </td>
                                                        <td><button disabled class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <div class="alert alert-primary" role="alert">
                                                Pilih Siswa Dengan Menekan Tombol Ceklis!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-3">
                                    <div class="row justify-content-center">
                                        <div class="col-10 text-center">
                                            <div class="alert alert-primary confirm-text" role="alert">
                                                Apakah Anda Yakin?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 justify-content-center">
                                        <div class="col-3">
                                            <div class="form-inline justify-content-between mt-3">
                                                <button class="btn btn-success confirm-wizard">
                                                    Ya
                                                </button>
                                                <button type="button" data-dismiss="modal" class="btn btn-danger">
                                                    Tidak
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /page content -->
        <?php $this->load->view('admin/template/footer') ?>

        <script type="text/javascript">
            var spp = document.getElementById('spp');
            spp.addEventListener('keyup', function(e) {
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatspp() untuk mengubah angka yang di ketik menjadi format angka
                spp.value = formatRupiah(this.value);
            });

            var kat = document.getElementById('kat');
            kat.addEventListener('keyup', function(e) {
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatkat() untuk mengubah angka yang di ketik menjadi format angka
                kat.value = formatRupiah(this.value);
            });

            /* Fungsi formatRupiah */
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
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        </script>

        <script>
            $(document).ready(function() {
                // setting
                var table = $('#dataSiswa').DataTable({
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ]
                });

                // check all
                $('#checkAll').on('click', function() {
                    var siswa_check = $('.id_siswa');
                    siswa_check.prop('checked', !siswa_check.prop("checked"))
                });

                // filter siswa
                $('#filter-siswa').on('change', function() {
                    console.log(this.value)
                    table.column(4)
                        .search(this.value)
                        .draw();
                });

                // smart wizard
                $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'dots',
                    autoAdjustHeight: true,
                    transitionEffect: 'fade',
                    showStepURLhash: false,

                });

                //confirm wizard submit
                $('.confirm-wizard').click(function() {
                    $('.form-naik-kelas').submit()
                })

            });
        </script>


</body>

</html>
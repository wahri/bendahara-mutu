<?php $this->load->view('kepsek/template/header') ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('kepsek/template/sidebar') ?>

            <?php $this->load->view('kepsek/template/topbar') ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Laporan Keuangan</h3>
                        </div>

                        <!-- <div class="title_right">
                            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div> -->

                    </div>

                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Cetak laporan hutang</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-5">
                                            <form action="<?= base_url('kepsek/laporan/hutang') ?>" method="GET">
                                                <div class="form-group">
                                                    <label for="kelas">Kelas</label>
                                                    <select name="kelas" class="form-control" id="kelas">
                                                        <option value="">Pilih kelas</option>
                                                        <option value="10">Kelas 10</option>
                                                        <option value="11">Kelas 11</option>
                                                        <option value="12">Kelas 12</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jurusan">Jurusan</label>
                                                    <select name="jurusan" class="form-control" id="jurusan">
                                                        <option value="">Pilih jurusan</option>
                                                        <?php foreach ($jurusan as $j) : ?>
                                                            <option value="<?= $j['nama_jurusan'] ?>"><?= $j['nama_jurusan'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-success">Cetak laporan hutang</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tabel Transaksi Uang Masuk</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <form class="form-inline mb-3" action="" method="get" autocomplete="off">
                                        <!-- <div class="form-group ml-2">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                                <input id="tgl_mulai" placeholder="<?= $this->input->get('tgl_awal') != null ? date('d F Y', strtotime($this->input->get('tgl_awal'))) : 'Pilih Tanggal Awal' ?>" type="text" class="form-control datepicker" name="tgl_awal">
                                            </div>
                                        </div>
                                        <div class="form-group ml-2">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                                <input id="tgl_akhir" placeholder="<?= $this->input->get('tgl_akhir') != null ? date('d F Y', strtotime($this->input->get('tgl_akhir'))) : 'Pilih Tanggal Akhir' ?>" type="text" class="form-control datepicker" name="tgl_akhir">
                                            </div>
                                        </div> -->
                                        <div id="sandbox-container">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                                <input type="text" class="input-sm form-control" id="tgl_awal" name="tgl_awal" placeholder="<?= $this->input->get('tgl_awal') != null ? date('d F Y', strtotime($this->input->get('tgl_awal'))) : 'Pilih Tanggal Awal' ?>" value="<?= $this->input->get('tgl_awal') ?>" />
                                                <span class="input-group-addon">s/d</span>
                                                <input type="text" class="input-sm form-control" id="tgl_akhir" name="tgl_akhir" placeholder="<?= $this->input->get('tgl_akhir') != null ? date('d F Y', strtotime($this->input->get('tgl_akhir'))) : 'Pilih Tanggal Akhir' ?>" value="<?= $this->input->get('tgl_akhir') ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group mb-1 ml-3">
                                            <button type="submit" class="btn btn-info">
                                                Filter
                                            </button>
                                            <?php if (!empty($this->input->get('tgl_awal'))) : ?>
                                                <a href="<?= base_url('kepsek/laporan') ?>" class="btn btn-secondary">Reset</a>
                                            <?php endif; ?>
                                        </div>
                                    </form>

                                    <?php if (!empty($laporan_uangmasuk)) : ?>
                                        <div class="row">
                                            <div class="col-12">
                                                <h1>Laporan Uang Masuk</h1>
                                                <table id="uang_masuk" class="table">
                                                    <thead class="thead-darkblue">
                                                        <tr>
                                                            <th>Kode Transaksi</th>
                                                            <th>NIS</th>
                                                            <th>Nama</th>
                                                            <th>Date</th>
                                                            <th>Nominal</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($laporan_uangmasuk as $d) : ?>
                                                            <tr>
                                                                <td class="align-middle"><?= $d['kode_transaksi'] ?></td>
                                                                <td class="align-middle"><?= $d['nis'] ?></td>
                                                                <td class="align-middle"><?= $d['nama'] ?></td>
                                                                <td class="align-middle"><?= date('d F Y', strtotime($d['date'])) ?></td>
                                                                <td class="align-middle">Rp. <?= number_format($d['total'], 0, ',', '.') ?></td>
                                                                <td class="text-center"><a href="<?= base_url('kepsek/laporan/detail_uang_masuk/') . $d['kode_transaksi'] ?>" class="btn btn-success">Detail</a></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    <tfoot class="thead-darkblue">
                                                        <tr>
                                                            <td class="text-right" colspan="4">Total : </td>
                                                            <td>Rp. <?= number_format($total_uangmasuk['total'], 0, ',', '.') ?></td>
                                                            <td></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($laporan_uangkeluar)) : ?>
                                        <div class="row mt-5">
                                            <div class="col-12">
                                                <h1>Laporan Uang Keluar</h1>
                                                <table id="uang_keluar" class="table">
                                                    <thead class="thead-darkblue">
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Nama Pemakai</th>
                                                            <th>Catatan</th>
                                                            <th>Nominal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($laporan_uangkeluar as $d) : ?>
                                                            <tr>
                                                                <td class="align-middle"><?= date('d F Y', strtotime($d['datetime'])) ?></td>
                                                                <td class="align-middle"><?= $d['nama_pemakai'] ?></td>
                                                                <td class="align-middle"><?= nl2br($d['catatan']) ?></td>
                                                                <td class="align-middle">Rp. <?= number_format($d['nominal'], 0, ',', '.') ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    <tfoot class="thead-darkblue">
                                                        <tr>
                                                            <td class="text-right" colspan="3">Total : </td>
                                                            <td>Rp. <?= number_format($total_uangkeluar['nominal'], 0, ',', '.') ?></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($this->input->get('tgl_awal'))) : ?>
                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <h1>Laporan</h1>
                                                <table class="table">
                                                    <thead class="thead-darkblue">
                                                        <tr>
                                                            <th>Uraian</th>
                                                            <th>Nominal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                Cash Sebelumnya
                                                            </td>
                                                            <td>
                                                                Rp. <?= number_format($cash_sebelumnya, 0, ',', '.') ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Total Uang Masuk
                                                            </td>
                                                            <td>
                                                                Rp. <?= number_format($total_uangmasuk['total'], 0, ',', '.') ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Total Uang Keluar
                                                            </td>
                                                            <td>
                                                                Rp. <?= number_format($total_uangkeluar['nominal'], 0, ',', '.') ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot class="thead-darkblue">
                                                        <tr>
                                                            <td class="text-right">Total cash saat ini : </td>
                                                            <?php
                                                            $cash = $cash_sebelumnya + $total_uangmasuk['total'] - $total_uangkeluar['nominal'];
                                                            ?>
                                                            <td>Rp. <?= number_format($cash, 0, ',', '.') ?></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <!-- /page content -->
            <?php $this->load->view('kepsek/template/footer') ?>
            <script>
                $(document).ready(function() {

                    //data table
                    var table = $('#uang_masuk').DataTable({})
                    $('#uang_keluar').DataTable({})

                    $(".datepicker").datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                        todayHighlight: true,
                    });
                    $("#tgl_mulai").on('changeDate', function(selected) {
                        var startDate = new Date(selected.date.valueOf());
                        $("#tgl_akhir").datepicker('setStartDate', startDate);
                        if ($("#tgl_mulai").val() > $("#tgl_akhir").val()) {
                            $("#tgl_akhir").val($("#tgl_mulai").val());
                        }
                    });

                })
            </script>

            <script>
                $('#sandbox-container .input-daterange').datepicker({
                    format: "dd M yyyy",
                    weekStart: 2,
                    startView: 2,
                    todayBtn: "linked",
                    orientation: "bottom auto"
                });
            </script>



</body>


</html>
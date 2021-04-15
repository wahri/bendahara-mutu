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
                                    <h2>Tabel Transaksi Uang Masuk</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th class="text-center" colspan="2">Laporan Pembayaran SPP Siswa</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center" colspan="2">TP. <?= (date('Y') - 1) ?> / <?= date('Y') ?></th>
                                                </tr>
                                                <tr>
                                                    <th width="40%">Kelas</th>
                                                    <td><?= $this->input->get('kelas') ?> <?= $this->input->get('jurusan') ?></td>
                                                </tr>
                                                <tr>
                                                    <th width="40%">Jml Siswa</th>
                                                    <td><?= $jml_siswa ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <table class="table table-bordered table-striped">
                                                <thead class="bg-secondary text-light">
                                                    <tr>
                                                        <th class="text-center align-middle" rowspan="2">No</th>
                                                        <th class="text-center align-middle" rowspan="2">NIS</th>
                                                        <th class="text-center align-middle" rowspan="2">Nama Siswa</th>
                                                        <th class="text-center align-middle" rowspan="2">Jumlah s/d DES <?= date('Y') - 1 ?></th>
                                                        <th class="text-center align-middle" colspan="6">SPP</th>
                                                        <!-- <th class="text-center align-middle" rowspan="2">Sukses Ujian Akhir</th> -->
                                                        <th class="text-center align-middle" rowspan="2">Jumlah s/d JUN <?= date('Y') ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center align-middle" width="1%">1</th>
                                                        <th class="text-center align-middle" width="1%">2</th>
                                                        <th class="text-center align-middle" width="1%">3</th>
                                                        <th class="text-center align-middle" width="1%">4</th>
                                                        <th class="text-center align-middle" width="1%">5</th>
                                                        <th class="text-center align-middle" width="1%">6</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;
                                                    foreach ($siswa as $s) : ?>
                                                        <?php
                                                        $spp = $this->db->get_where('siswa', ['nis' => $s['nis']])->row()->spp;
                                                        $tahun_masuk = $this->db->get_where('siswa', ['nis' => $s['nis']])->row()->tahun_masuk;

                                                        $this->db->select_sum('jml_dibayar');
                                                        $this->db->where(['nis' => $s['nis'], 'tahun <' => date('Y')]);
                                                        $spp_dibayar = $this->db->get('tagihan')->row()->jml_dibayar;


                                                        //data awal
                                                        $tgl_mulai = $tahun_masuk . '-07-01';
                                                        $tgl_selesai = (date('Y') - 1) . '-12-31';

                                                        //convert
                                                        $timeStart = strtotime($tgl_mulai);
                                                        $timeEnd = strtotime($tgl_selesai);

                                                        // Menambah bulan ini + semua bulan pada tahun sebelumnya
                                                        $numBulan = 1 + (date("Y", $timeEnd) - date("Y", $timeStart)) * 12;

                                                        // hitung selisih bulan
                                                        $numBulan += date("m", $timeEnd) - date("m", $timeStart);

                                                        $jumlah_sebelum = ($numBulan * $spp) - $spp_dibayar;

                                                        $jumlah_hutang_seluruh = $jumlah_sebelum;
                                                        ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $s['nis'] ?></td>
                                                            <td><?= $s['nama'] ?></td>
                                                            <td class="text-center <?= $jumlah_sebelum > 0 ? $jumlah_sebelum : 'bg-dark text-light' ?>">
                                                                <?= $jumlah_sebelum > 0 ? 'Rp. ' . number_format($jumlah_sebelum, 0, ',', '.') : '<i class="fa fa-check"></i>' ?>
                                                            </td>
                                                            <?php if (cek_spp($s['nis'], 1, date('Y')) == 1) : ?>
                                                                <td class="bg-dark text-light"><i class="fa fa-check"></i></td>
                                                            <?php else : ?>
                                                                <td><small><?= substr(cek_spp($s['nis'], 1, date('Y')), 0, -3) ?></small></td>
                                                            <?php
                                                                if (cek_spp($s['nis'], 1, date('Y') > 0)) {
                                                                    $jumlah_hutang_seluruh += cek_spp($s['nis'], 1, date('Y'));
                                                                } else {
                                                                    $jumlah_hutang_seluruh += $s['spp'];
                                                                }
                                                            endif;
                                                            ?>
                                                            <?php if (cek_spp($s['nis'], 2, date('Y')) == 1) : ?>
                                                                <td class="bg-dark text-light"><i class="fa fa-check"></i></td>
                                                            <?php else : ?>
                                                                <td><small><?= substr(cek_spp($s['nis'], 2, date('Y')), 0, -3) ?></small></td>
                                                            <?php
                                                                if (cek_spp($s['nis'], 2, date('Y') > 0)) {
                                                                    $jumlah_hutang_seluruh += cek_spp($s['nis'], 2, date('Y'));
                                                                } else {
                                                                    $jumlah_hutang_seluruh += $s['spp'];
                                                                }
                                                            endif;
                                                            ?>
                                                            <?php if (cek_spp($s['nis'], 3, date('Y')) == 1) : ?>
                                                                <td class="bg-dark text-light"><i class="fa fa-check"></i></td>
                                                            <?php else : ?>
                                                                <td><small><?= substr(cek_spp($s['nis'], 3, date('Y')), 0, -3) ?></small></td>
                                                            <?php
                                                                if (cek_spp($s['nis'], 3, date('Y') > 0)) {
                                                                    $jumlah_hutang_seluruh += cek_spp($s['nis'], 3, date('Y'));
                                                                } else {
                                                                    $jumlah_hutang_seluruh += $s['spp'];
                                                                }
                                                            endif;
                                                            ?>
                                                            <?php if (cek_spp($s['nis'], 4, date('Y')) == 1) : ?>
                                                                <td class="bg-dark text-light"><i class="fa fa-check"></i></td>
                                                            <?php else : ?>
                                                                <td><small><?= substr(cek_spp($s['nis'], 4, date('Y')), 0, -3) ?></small></td>
                                                            <?php
                                                                if (cek_spp($s['nis'], 4, date('Y') > 0)) {
                                                                    $jumlah_hutang_seluruh += cek_spp($s['nis'], 4, date('Y'));
                                                                } else {
                                                                    $jumlah_hutang_seluruh += $s['spp'];
                                                                }
                                                            endif;
                                                            ?>
                                                            <?php if (cek_spp($s['nis'], 5, date('Y')) == 1) : ?>
                                                                <td class="bg-dark text-light"><i class="fa fa-check"></i></td>
                                                            <?php else : ?>
                                                                <td><small><?= substr(cek_spp($s['nis'], 5, date('Y')), 0, -3) ?></small></td>
                                                            <?php
                                                                if (cek_spp($s['nis'], 5, date('Y') > 0)) {
                                                                    $jumlah_hutang_seluruh += cek_spp($s['nis'], 5, date('Y'));
                                                                } else {
                                                                    $jumlah_hutang_seluruh += $s['spp'];
                                                                }
                                                            endif;
                                                            ?>
                                                            <?php if (cek_spp($s['nis'], 6, date('Y')) == 1) : ?>
                                                                <td class="bg-dark text-light"><i class="fa fa-check"></i></td>
                                                            <?php else : ?>
                                                                <td><small><?= substr(cek_spp($s['nis'], 6, date('Y')), 0, -3) ?></small></td>
                                                            <?php
                                                                if (cek_spp($s['nis'], 6, date('Y') > 0)) {
                                                                    $jumlah_hutang_seluruh += cek_spp($s['nis'], 6, date('Y'));
                                                                } else {
                                                                    $jumlah_hutang_seluruh += $s['spp'];
                                                                }
                                                            endif;
                                                            ?>
                                                            <td>Rp. <?= number_format($jumlah_hutang_seluruh, 0, ',', '.') ?></td>
                                                        </tr>
                                                    <?php $i++;
                                                    endforeach; ?>
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
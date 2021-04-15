<?php $this->load->view('bendahara/template/header') ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('bendahara/template/sidebar') ?>

            <?php $this->load->view('bendahara/template/topbar') ?>

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
                                            <form action="<?= base_url('bendahara/laporan/hutang') ?>" method="GET">
                                                <div class="form-group">
                                                    <label for="jurusan">Jurusan</label>
                                                    <select name="jurusan" class="form-control" id="jurusan">
                                                        <option value="">Pilih jurusan</option>
                                                        <?php foreach ($jurusan as $j) : ?>
                                                            <option value="<?= $j['nama_jurusan'] ?>"><?= $j['nama_jurusan'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="angkatan">Tahun angkatan</label>
                                                    <input type="number" class="form-control" name="tahun_angkatan" placeholder="Tahun Masuk Angkatan">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kelas">Kelas</label>
                                                    <select name="kelas" class="form-control" id="kelas">
                                                        <option value="">Pilih kelas</option>
                                                        <option value="1">Kelas 10</option>
                                                        <option value="2">Kelas 11</option>
                                                        <option value="3">Kelas 12</option>
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


                </div>
            </div>


            <!-- /page content -->
            <?php $this->load->view('bendahara/template/footer') ?>
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
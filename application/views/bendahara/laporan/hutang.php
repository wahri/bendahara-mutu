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
                                    <h2>Tabel Transaksi Uang Masuk</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <a href="<?= base_url('bendahara/laporan/hutang') ?>" class="btn btn-success">Cetak laporan hutang per kelas</a>

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
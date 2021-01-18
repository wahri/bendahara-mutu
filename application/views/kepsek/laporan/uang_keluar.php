<?php $this->load->view('admin/template/header') ?>

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
                            <h3>Uang Keluar</h3>
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

                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tabel Transaksi Uang Keluar</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-inline mb-3" action="" method="post">
                                        <div class="form-group ml-2">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                                <input id="tgl_mulai" placeholder="Pilih Tanggal Awal" type="text" class="form-control datepicker" name="tgl_awal">
                                            </div>
                                        </div>
                                        <div class="form-group ml-2">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                                <input id="tgl_akhir" placeholder="Pilih Tanggal Akhir" type="text" class="form-control datepicker" name="tgl_akhir">
                                            </div>
                                        </div>
                                        <div class="form-group mb-1 ml-3">
                                            <button class="btn btn-success">
                                                submit
                                            </button>
                                        </div>
                                    </form>

                                    <table id="uang_masuk" class="table">
                                        <thead class="thead-darkblue">
                                            <tr>
                                                <th>Action</th>
                                                <th>Akun</th>
                                                <th>Catatan</th>
                                                <th>Date</th>
                                                <th>Nominal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="<?= base_url('kepsek/lapora/detail_uang_keluar/1') ?>" class="btn btn-success">Detail</a></td>
                                                <td>Akun 1</td>
                                                <td>-</td>
                                                <td>24/09/2020</td>
                                                <td>Rp.900.000</td>
                                            </tr>
                                            <tr>
                                                <td><a href="<?= base_url('kepsek/transaksi/uang_keluar/1') ?>" class="btn btn-success">Detail</a></td>
                                                <td>Akun 1</td>
                                                <td>-</td>
                                                <td>24/09/2020</td>
                                                <td>Rp.900.000</td>
                                            </tr>
                                            <tr>
                                                <td><a href="<?= base_url('kepsek/transaksi/uang_keluar/1') ?>" class="btn btn-success">Detail</a></td>
                                                <td>Akun 2</td>
                                                <td>-</td>
                                                <td>24/09/2020</td>
                                                <td>Rp.900.000</td>
                                            </tr>
                                            <tr>
                                                <td><a href="<?= base_url('kepsek/transaksi/uang_keluar/1') ?>" class="btn btn-success">Detail</a></td>
                                                <td>Akun 3</td>
                                                <td>-</td>
                                                <td>24/09/2020</td>
                                                <td>Rp.900.000</td>
                                            </tr>
                                            <tr>
                                                <td><a href="<?= base_url('kepsek/transaksi/uang_keluar/1') ?>" class="btn btn-success">Detail</a></td>
                                                <td>Akun 4</td>
                                                <td>-</td>
                                                <td>24/09/2020</td>
                                                <td>Rp.900.000</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="thead-darkblue">
                                            <tr>
                                                <td class="text-right" colspan="4">Total : </td>
                                                <td>Rp.3.6 00.000</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <!-- /page content -->
            <?php $this->load->view('admin/template/footer') ?>
            <script>
                $(document).ready(function() {

                    //data table
                    var table = $('#uang_masuk').DataTable({})

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



</body>


</html>
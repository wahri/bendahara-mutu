<?php $this->load->view('admin/template/header') ?>

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
                            <h3>Uang Masuk</h3>
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
                                    <h2>Tabel Transaksi Uang Masuk</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-inline mb-3" action="" method="get">
                                        <div class="form-group ml-2">
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
                                        </div>
                                        <div class="form-group mb-1 ml-3">
                                            <button type="submit" class="btn btn-info">
                                                Filter
                                            </button>
                                        </div>
                                    </form>
                                    <?php if (!empty($laporan)) : ?>
                                        <table id="uang_masuk" class="table mt-2">
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
                                                <?php foreach ($laporan as $d) : ?>
                                                    <tr>
                                                        <td><?= $d['kode_transaksi'] ?></td>
                                                        <td><?= $d['nis'] ?></td>
                                                        <td><?= $d['nama'] ?></td>
                                                        <td><?= date('d F Y', strtotime($d['date'])) ?></td>
                                                        <td>Rp. <?= number_format($d['total'], 0, ',', '.') ?></td>
                                                        <td><a href="<?= base_url('bendahara/transaksi/uang_masuk/') . $d['kode_transaksi'] ?>" class="btn btn-success">Detail</a></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot class="thead-darkblue">
                                                <tr>
                                                    <td class="text-right" colspan="4">Total : </td>
                                                    <td>Rp. <?= number_format($total_laporan['total'], 0, ',', '.') ?></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    <?php endif; ?>
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
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

                    <div class="row">
                        <div class="col-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Pembayaran</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div class="col-12">
                                        <table id="dataSiswa" style="width: 100%;" class="table table-striped">
                                            <thead class="thead-darkblue">
                                                <tr>
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

                                                        <td><?= $s['nama'] ?></td>
                                                        <td><?= $s['nis'] ?></td>
                                                        <td><?= $s['nisn'] ?></td>
                                                        <td><?= $s['kelas'] ?></td>
                                                        <td><?= $s['tahun_masuk'] ?></td>
                                                        <td><?= $s['tahun_lulus'] ?></td>
                                                        <td><?= $s['cash'] ?></td>
                                                        <td><a href="<?= base_url('bendahara/pembayaran/detail/') . $s['nis'] ?>" class="btn btn-success"><i class="fa fa-dollar" aria-hidden="true"></i> Bayar
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

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


            <!-- Tombol bayar -->
            <script>
                <?php foreach ($bulan as $n => $b) : ?>
                    $('#tombol<?= $n ?>').click(function() {
                        $('#tombol<?= $n ?>').hide()
                        $('#form<?= $n ?>').show()
                    })
                <?php endforeach; ?>
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

                    // filter siswa
                    $('#filter-siswa').on('change', function() {
                        console.log(this.value)
                        table.column(3)
                            .search(this.value)
                            .draw();
                    });
                });
            </script>



</body>


</html>
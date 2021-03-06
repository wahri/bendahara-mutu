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
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group mb-4">
                                                <label for="filter-siswa">Filter Siswa</label>
                                                <select class="custom-select" id="filter-siswa">
                                                    <option value="">Semua Kelas</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="Alumni">Alumni</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group mb-4">
                                                <label for="filter-jurusan">Filter Jurusan</label>
                                                <select class="custom-select" id="filter-jurusan">
                                                    <option value="">Semua Jurusan</option>
                                                    <?php foreach ($jurusan as $j) : ?>
                                                        <option value="<?= $j['nama_jurusan'] ?>"><?= $j['nama_jurusan'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <table id="dataSiswa" class="table table-striped">
                                                <thead class="thead-darkblue">
                                                    <tr>
                                                        <th>No</th>
                                                        <th width="">Nama</th>
                                                        <th width="">NIS</th>
                                                        <th width="">NISN</th>
                                                        <th width="">Kelas</th>
                                                        <th width="">Jurusan</th>
                                                        <!-- <th width="">Tahun Masuk</th>
                                                    <th width="">Tahun Lulus</th>
                                                    <th width="15%">Cash</th> -->
                                                        <th width="">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $i = 1;
                                                    foreach ($siswa as $s) : ?>
                                                        <tr>

                                                            <td><?= $i ?></td>
                                                            <td><?= $s['nama'] ?></td>
                                                            <td><?= $s['nis'] ?></td>
                                                            <td><?= $s['nisn'] ?></td>
                                                            <td><?= $s['kelas'] == 13 ? 'Alumni ' . $s['tahun_lulus'] : $s['kelas'] ?></td>
                                                            <td><?= $s['jurusan'] ?></td>
                                                            <!-- <td><?= $s['tahun_masuk'] ?></td>
                                                        <td><?= $s['tahun_lulus'] ?></td>
                                                        <td><?= $s['cash'] ?></td> -->
                                                            <td><a href="<?= base_url('bendahara/pembayaran/detail/') . $s['nis'] ?>" class="btn btn-success"><i class="fa fa-dollar" aria-hidden="true"></i> Bayar
                                                            </td>
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
                        table.column(4)
                            .search(this.value)
                            .draw();
                    });
                    $('#filter-jurusan').on('change', function() {
                        console.log(this.value)
                        table.column(5)
                            .search(this.value)
                            .draw();
                    });
                });
            </script>



</body>


</html>
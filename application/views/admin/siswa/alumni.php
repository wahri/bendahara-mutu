<?php $this->load->view('admin/template/header') ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('admin/template/sidebar') ?>

            <?php $this->load->view('admin/template/topbar') ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <!-- <div class="row justify-content-center">
                    <div class="col-12 col-md-4">
                        <div class="card  text-white mb-3" style="max-width: 30rem; ">
                            <div class="card-header bg-light-blue">Data Pembayaran</div>
                            <div class="card-body py-4 bg-dark-blue">
                                <i class="fa fa-usd fa-2x" aria-hidden="true"></i>
                                <a class="custom-link" href="<?= base_url('bendahara/pembayaran') ?>">
                                    <h5 class="card-title d-inline ml-2">Pembayaran</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card  text-white mb-3" style="max-width:30rem; ">
                            <div class="card-header bg-light-blue">Data Uang Keluar</div>
                            <div class="card-body py-4 bg-dark-blue">
                                <i class="fa fa-usd fa-2x" aria-hidden="true"></i>
                                <a class="custom-link" href="uangkeluar.html">
                                    <h5 class="card-title d-inline ml-2">Uang Keluar</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card  text-white mb-3" style="max-width:30rem; ">
                            <div class="card-header bg-light-blue">Laporan</div>
                            <div class="card-body py-4 bg-dark-blue">
                                <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
                                <a class="custom-link" href="pembayaran.html">
                                    <h5 class="card-title d-inline ml-2">Laporan</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="">
                   
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-1">
                            <a id="cartButton" href="<?= base_url('admin/siswa') ?>" class="btn btn-lg btn-success">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-3">

                        <div class="col-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Data Alumni</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                  
                                    <div class="row">
                                        <div class="col-12">
                                            <table id="dataSiswa" style="width: 100%;" class="table table-striped">
                                                <thead class="thead-darkblue">
                                                    <tr>
                                                        <th class="text-center">NISN</th>
                                                        <th class="text-center">NIS</th>
                                                        <th class="">Nama</th>
                                                        <th class="text-center">Jurusan</th>
                                                    
                                                        <th class="text-center">Tahun Masuk</th>
                                                        <th class="text-center">Tahun Lulus</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach ($siswa as $s) : ?>
                                                        <tr>
                                                            <td class="text-center"><?= $s['nisn'] ?></td>
                                                            <td class="text-center"><?= $s['nis'] ?></td>
                                                            <td class=""><?= $s['nama'] ?></td>
                                                            <td class="text-center"><?= $s['jurusan'] ?></td>
                                    
                                                            <td class="text-center"><?= $s['tahun_masuk'] ?></td>
                                                            <td class="text-center"><?= $s['tahun_lulus'] ?></td>
                                                            <td class="text-center"><a href="<?= base_url('admin/siswa/detail/') . $s['id'] ?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>
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
            </div>
        </div>
    </div>


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
        // setting
        var table = $('#dataSiswa').DataTable();
        // filter siswa
        $('#filter-siswa').on('change', function() {
            console.log(this.value)
            table.column(3)
                .search(this.value)
                .draw();
        });
    </script>

</body>

</html>
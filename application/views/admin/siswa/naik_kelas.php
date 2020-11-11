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
                    <div class="row">
                        <div class="col-1">
                            <a id="cartButton" href="<?= base_url('admin/siswa') ?>" class="btn btn-lg btn-success">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Kenaikan Kelas</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="alert alert-secondary" role="alert">
                                                Silahkan pilih jika ada siswa yang tidak naik kelas dan tekan tombol naik kelas!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-inline mx-4 mb-4">
                                                <label for="filter-siswa">Filter Siswa</label>
                                                <select class="custom-select ml-2" id="filter-siswa">
                                                    <option value="">Semua Kelas</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="Alumni">Alumni</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-4 text-right offset-4">
                                            <button class="btn btn-sm btn-success" onclick="document.getElementById('formNaikKelas').submit()">
                                                <i class="fa fa-arrow-up" aria-hidden="true"></i> Naik Kelas
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <form id="formNaikKelas" action="" method="post">
                                                <table id="dataSiswa" style="width: 100%;" class="table table-striped">
                                                    <thead class="thead-darkblue">
                                                        <tr>
                                                            <th class="text-center">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </th>
                                                            <th class="text-center" width="10%">Nama</th>
                                                            <th class="text-center">NIS</th>
                                                            <th class="text-center">NISN</th>
                                                            <th class="text-center">Kelas</th>
                                                            <th class="text-center">Tahun Masuk</th>
                                                            <th class="text-center">Tahun Lulus</th>
                                                            <th class="text-center" width="20%">Cash</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php foreach ($siswa as $s) : ?>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <input type="checkbox" aria-label="Checkbox for following text input">

                                                                </td>
                                                                <td class="text-center"><?= $s['nama'] ?></td>
                                                                <td class="text-center"><?= $s['nis'] ?></td>
                                                                <td class="text-center"><?= $s['nisn'] ?></td>
                                                                <td class="text-center"><?= $s['kelas'] ?></td>
                                                                <td class="text-center"><?= $s['tahun_masuk'] ?></td>
                                                                <td class="text-center"><?= $s['tahun_lulus'] ?></td>
                                                                <td class="text-center"><?= $s['cash'] ?></td>

                                                            </tr>
                                                        <?php endforeach; ?>

                                                    </tbody>
                                                </table>
                                            </form>
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
            table.column(4)
                .search(this.value)
                .draw();
        });
    </script>

</body>

</html>
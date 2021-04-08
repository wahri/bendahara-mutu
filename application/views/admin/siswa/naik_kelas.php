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
                                    <h2>Data Kelas <?= $kelas ?></h2>
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
                                            <?php if ($kelas != 10) : ?>
                                                <a href="<?= base_url('admin/siswa/naik_kelas/') . ($kelas - 1) ?>" class="btn btn-success btn-xs">
                                                    Kelas <?= $kelas - 1 ?>
                                                </a>
                                            <?php
                                            else :
                                            ?>
                                                <a href="<?= base_url('admin/siswa/') ?>" class="btn btn-success btn-xs">
                                                    Selesai
                                                </a>
                                            <?php endif; ?>
                                            <!-- modal yakin? -->
                                            <div class="modal fade" id="yakin" tabindex="-1" aria-labelledby="yakinLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="yakinLabel">Apakah anda yakin?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-left">Semua data kelas siswa selain yang di cek akan berubah, apakah anda yakin? </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button class="btn btn-success" onclick="document.getElementById('formNaikKelas').submit()">
                                                                <i class="fa fa-arrow-up" aria-hidden="true"></i> Naik Kelas
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <form id="formNaikKelas" action="<?= base_url('admin/siswa/progresnaikkelas/' . $kelas) ?>" method="post">
                                                <table id="dataSiswa" style="width: 100%;" class="table table-striped">
                                                    <thead class="thead-darkblue">
                                                        <tr>
                                                            <th class="text-center">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </th>
                                                            <th class="text-center">NIS</th>
                                                            <th class="text-center" width="10%">Nama</th>
                                                            <th class="text-center">NISN</th>
                                                            <th class="text-center">Kelas</th>
                                                            <th class="text-center">Tahun Masuk</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php foreach ($siswa as $s) : ?>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <input type="checkbox" aria-label="Checkbox for following text input" value="<?= $s['nis'] ?>" name="nis[]">
                                                                </td>
                                                                <td class="text-center"><?= $s['nis'] ?></td>
                                                                <td class="text-center"><?= $s['nama'] ?></td>
                                                                <td class="text-center"><?= $s['nisn'] ?></td>
                                                                <td class="text-center"><?= $s['kelas'] ?></td>
                                                                <td class="text-center"><?= $s['tahun_masuk'] ?></td>

                                                            </tr>
                                                        <?php endforeach; ?>

                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-2 offset-10 d-flex justify-content-end">
                                            <button type="button" data-toggle="modal" data-target="#yakin" class="btn btn-success btn-xs">
                                                Update
                                            </button>
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
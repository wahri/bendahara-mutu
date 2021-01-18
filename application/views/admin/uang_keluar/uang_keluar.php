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
                    <div class="page-title">
                        <div class="title_left">
                            <h3><?= $title ?></h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Penghapusan transaksi uang keluar</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php if (!empty($this->session->flashdata('message'))) : ?>
                                        <div class="alert alert-success alert-dismissible " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <?php echo $this->session->flashdata('message'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($this->session->flashdata('message_error'))) : ?>
                                        <div class="alert alert-error alert-dismissible " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <?php echo $this->session->flashdata('message_error'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="col-6">
                                            <?php
                                            $cash = $total_uangmasuk['total'] - $total_uangkeluar['nominal'];
                                            ?>
                                            <h2 class="btn btn-info btn-round">Cash : Rp. <?= number_format($cash, 0, ',', '.') ?></h2>

                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <table class="table mt-2 table-striped" id="transaksi">
                                                <thead class="thead-darkblue">
                                                    <tr>
                                                        <th>Tanggal</th>
                                                        <th>Nama Pengambil</th>
                                                        <th>Nominal</th>
                                                        <th>Catatan</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($transaksi_pengeluaran as $d) : ?>
                                                        <tr>
                                                            <td class="align-middle"><?= date('d F Y', strtotime($d['datetime'])) ?></td>
                                                            <td class="align-middle"><?= $d['nama_pemakai'] ?></td>
                                                            <td class="align-middle">Rp. <?= number_format($d['nominal'], 0, ',', '.') ?></td>
                                                            <td><?= nl2br($d['catatan']) ?></td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusdata">Hapus</button>
    
                                                                <!-- modal -->
                                                                <div class="modal fade" id="hapusdata" tabindex="-1" role="dialog" aria-labelledby="hapusdataLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="hapusdataLabel">Apakah anda yakin?</h5>
                                                                                <a href="<?= base_url('admin/uang_keluar/hapustransaksi/') . $d['id_transaksi'] ?>" class="btn btn-danger ml-auto">Hapus</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
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

    <script>
        $('#transaksi').DataTable();
    </script>

</body>

</html>
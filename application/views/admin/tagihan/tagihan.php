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
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Tagihan</h3>
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
                        <div class="col-12">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tambah tagihan</h2>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    <form action="<?= base_url('admin/tagihan/buattagihanlainnya') ?>" method="POST">
                                        <div class="form-group">
                                            <label for="pilih_kelas">Ruang Lingkup Tagihan</label>
                                            <select name="pilih_kelas" class="custom-select">
                                                <option value="all">Semua Siswa</option>
                                                <option value="10">Kelas 10</option>
                                                <option value="11">Kelas 11</option>
                                                <option value="12">Kelas 12</option>
                                                <!-- <option value="13">Alumni</option> -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Jumlah tagihan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Rp.</span>
                                                </div>
                                                <input name="harga" id="harga" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_tagihan">Nama Tagihan</label>
                                            <input type="text" name="nama_tagihan" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-success">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tabel tagihan</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table class="table">
                                        <thead class="thead-darkblue">
                                            <tr>
                                                <th>tagihan</th>
                                                <th>Tagihan</th>
                                                <th>Expire Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="pembayaranModal" tabindex="-1" role="dialog" aria-labelledby="pembayaranModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="POST" action="<?= base_url('admin/tagihan/tambahpembayaran') ?>">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pembayaranModalLabel">Tambah Pembayaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="nama_pembayaran">Nama Pembayaran</label>
                                    <input type="text" id="nama_pembayaran" name="nama_pembayaran" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" id="harga" name="harga" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="">Tipe Pembayaran </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kode_tagihan" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">SPP</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kode_tagihan" id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Bukan SPP</label>
                                    </div>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- /page content -->
            <?php $this->load->view('admin/template/footer') ?>

            <script type="text/javascript">
                var harga = document.getElementById('harga');
                harga.addEventListener('keyup', function(e) {
                    // tambahkan 'Rp.' pada saat form di ketik
                    // gunakan fungsi formatkat() untuk mengubah angka yang di ketik menjadi format angka
                    harga.value = formatRupiah(this.value);
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
                $('.datepicker').datepicker();
            </script>
</body>


</html>
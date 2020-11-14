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
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-1">
                            <a id="cartButton" href="<?= base_url('bendahara/uang_keluar') ?>" class="btn btn-lg btn-success">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tambah Transaksi</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <label for="akun">Akun</label>
                                                    <select class="form-control" name="akun" id="akun">
                                                        <option value="">Pilih Akun</option>
                                                        <option value="">Akun 1</option>
                                                        <option value="">Akun 2</option>
                                                        <option value="">Akun 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nominal">Nominal</label>
                                                    <input type="text" id="nominal" name="nominal" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="catatan">Catatan</label>
                                                    <input id="catatan" name="catatan" type="text" class="form-control"></div>

                                                <div class="form-group">
                                                    <button class="btn btn-success">
                                                        Submit
                                                    </button>
                                                </div>
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
    <!-- /page content -->
    <?php $this->load->view('admin/template/footer') ?>

    <script type="text/javascript">
        var nominal = document.getElementById('nominal');
        nominal.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatkat() untuk mengubah angka yang di ketik menjadi format angka
            nominal.value = formatRupiah(this.value);
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
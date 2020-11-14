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
                            <a id="cartButton" href="<?= base_url('admin/keuangan/saldo/1') ?>" class="btn btn-lg btn-success">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tambah Saldo</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <label for="nama_saldo">Nama Saldo</label>
                                                    <input id="nama_saldo" name="nama_saldo" type="text" class="form-control"></div>
                                                <div class="form-group">
                                                    <label for="nominal">Nominal</label>
                                                    <div class="input-group flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="text" id="nominal" placeholder="0" name="nominal" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="periode">Periode</label>
                                                    <div class="input-group date" data-provide="datepicker">
                                                        <input type="text" class="form-control" name="periode">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-th"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="expired">Expired</label>
                                                    <div class="input-group date" data-provide="datepicker">
                                                        <input type="text" class="form-control" name="expired">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-th"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="tambah_saldo" value="1" class="btn btn-success">
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
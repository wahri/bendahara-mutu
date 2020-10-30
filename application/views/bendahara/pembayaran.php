<?php $this->load->view('bendahara/template/header') ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('bendahara/template/sidebar') ?>

            <?php $this->load->view('bendahara/template/topbar') ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="row" style="margin-top: 80px;">

                    <div class="col-8 col-sm-8">
                        <form class="form-inline">
                            <select name="nis" id="nis" class="selectpicker" data-live-search="true">
                                <option>Cari Data Siswa</option>
                                <?php foreach ($this->db->get('siswa')->result() as $row) : ?>
                                    <option value="<?= $row->nis ?>"><?= $row->nama ?> - <?= $row->nis ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" id="cariSiswa" class="btn btn-primary ml-3">Cari</button>
                        </form>
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

            <!-- format rupiah -->
            <script type="text/javascript">
                var uang = document.querySelectorAll('.formatrupiah');
                uang.addEventListener('keyup', function(e) {
                    // tambahkan 'Rp.' pada saat form di ketik
                    // gunakan fungsi formatuang() untuk mengubah angka yang di ketik menjadi format angka
                    uang.value = formatRupiah(this.value, 'Rp.  ');
                });

                $('.formatrupiah').keyup(formatRupiah(this.value))

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
</body>

<script>
    $(function() {
        $('#cariSiswa').on('click', function(e) {
            e.preventDefault();
            var data = $('#nis').val();
            window.location.href = "<?= base_url('bendahara/pembayaran/detail/') ?>" + data;
        })
    })
</script>

</html>
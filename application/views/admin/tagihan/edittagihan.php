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
                            <h3><?= $title ?></h3>
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
                                    <h2>Edit Tagihan</h2>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="harga">Jumlah Tagihan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Rp.</span>
                                                </div>
                                                <input name="harga" id="harga" value="<?= number_format($tagihans['harga'], 0, ',', '.')  ?>" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_tagihan">Nama Tagihan</label>
                                            <input type="text" name="nama_tagihan" value="<?= $tagihans['nama_tagihan'] ?>" class="form-control">
                                        </div>
                                        <div class="form-group my-3">
                                            <button type="button" class="btn btn btn-danger" data-toggle="modal" data-target="#hapusdata">Hapus data tagihan!</button>

                                            <!-- modal -->
                                            <div class="modal fade" id="hapusdata" tabindex="-1" role="dialog" aria-labelledby="hapusdataLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="hapusdataLabel">Apakah anda yakin?</h5>
                                                            <a href="<?= base_url('admin/tagihan/deletetagihan/') . $tagihans['kode_tagihan'] ?>" class="btn btn-danger ml-auto">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="<?= base_url('admin/tagihan') ?>" class="btn btn-secondary">
                                                Batal
                                            </a>
                                            <button class="btn btn-success">
                                                Update
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
                                                <th>No</th>
                                                <th>Nama Tagihan</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($tagihan as $t) : ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td>
                                                        <?= $t['nama_tagihan'] ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('admin/tagihan/edittagihan/') . $t['kode_tagihan'] ?>" class="btn btn-warning text-dark ml-3"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                            <?php $i++;
                                            endforeach; ?>
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
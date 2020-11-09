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
                        <div class="col-md-6 col-sm-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Buat Tagihan</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form method="POST" action="<?= base_url('admin/tagihan/buattagihan') ?>">
                                        <!-- <div class="form-group">
                                            <label for="">Pilih Jenis Tagihan</label>
                                            <select name="tagihan" id="tagihan" class="custom-select" data-live-search="true">
                                                <?php $pembayaran = $this->db->get("pembayaran");
                                                foreach ($pembayaran->result() as $row) :
                                                ?>
                                                    <option value="<?= $row->id ?>"><?= $row->nama_pembayaran ?></option>

                                                <?php endforeach; ?>
                                            </select>
                                        </div> -->
                                        <div class="form-group">
                                            <label for="">Pilih Lingkup Tagihan</label>
                                            <select name="lingkup" class="custom-select" data-live-search="true">
                                                <option value="all">Semua Siswa</option>
                                                <option value="10">Kelas 10</option>
                                                <option value="11">Kelas 11</option>
                                                <option value="12">Kelas 12</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="nama_tagihan">
                                            <label for="nama_tagihan">Nama Tagihan</label>
                                            <input id="nama_tagihan" placeholder="..." name="nama_tagihan" type="text" class="form-control">
                                        </div>
                                        <div class="form-group" id="harga">
                                            <label for="harga">Nominal</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                </div>
                                                <input type="text" class="form-control" id='rupiah' name="harga">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit">Buat Tagihan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tambah Pembayaran</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-success" type="button" data-toggle="modal" data-target="#pembayaranModal"> <i class="fa fa-plus" aria-hidden="true"></i> Pembayaran</button>
                                    </div>
                                    <table class="table">
                                        <thead class="thead-darkblue">
                                            <tr>
                                                <th>Nama Pembayaran</th>
                                                <th>Harga</th>
                                                <th>Tipe</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $pembayaran = $this->db->get("pembayaran"); ?>
                                            <?php foreach ($pembayaran->result() as $row) : ?>
                                                <tr>

                                                    <td>
                                                        <?= $row->nama_pembayaran; ?>
                                                    </td>
                                                    <td>
                                                        <?= "Rp." . $row->harga . ",-" ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row->kode_tagihan == 1) :
                                                        ?>
                                                            <span class="badge badge-success">SPP</span>

                                                        <?php else : ?>
                                                            <span class="badge badge-danger">Bukan SPP</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
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
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- /page content -->
            <?php $this->load->view('admin/template/footer') ?>
            <!-- membuat format rupiah -->
            <script>
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
                    return rupiah;
                }

                var elements = document.getElementById("rupiah");
                elements.addEventListener('keyup', function(e) {
                    // tambahkan 'Rp.' pada saat form di ketik
                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                    rupiah.value = formatRupiah(this.value, 'Rp. ');
                });
            </script>
</body>


</html>
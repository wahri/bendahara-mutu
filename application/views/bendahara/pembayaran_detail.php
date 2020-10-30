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

                    <div class="col-1">
                        <a id="cartButton" href="<?= base_url('bendahara/pembayaran') ?>" class="btn btn-lg btn-success">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="col-1 offset-8 offset-lg-9">
                        <a id="cartButton" href="<?= base_url('bendahara/transaksi/log/') . $siswa['nis'] ?>" class="btn btn-lg btn-success">
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                        </a>
                    </div>

                    <?php if (!empty($siswa)) : ?>
                        <div class="col-1 offset-1 offset-sm-0">
                            <button id="cartButton" type="button" data-toggle="modal" data-target="#cartModal" class="btn btn-lg btn-success">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                    <?php endif; ?>

                </div>




                <!-- Pembayaran siswa -->
                <?php if (!empty($siswa)) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Data Siswa</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-4"> <img src="<?= base_url('assets/img/siswa.png') ?>" alt="..." class="img-thumbnail img-fluid"></div>
                                        <div class="col-8 d-flex flex-column justify-content-center">
                                            <ul style="list-style: none;">
                                                <li>
                                                    <h2>Nama Siswa :</h2>
                                                    <h2 class="text-success"> <?= $siswa['nama'] ?></h2>
                                                </li>
                                                <li class="mt-3">
                                                    <h2>NIS :</h2>
                                                    <h2 class="text-primary"> <?= $siswa['nis'] ?></h2>
                                                </li>
                                                <li class="mt-3">
                                                    <h2>NISN :</h2>
                                                    <h2 class="text-primary"> <?= $siswa['nisn'] ?></h2>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row mt-3">
                        <div class="col-12">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">


                                <?php $iteration = 1;
                                foreach ($this->db->get('pembayaran')->result()  as $row) :
                                ?>

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link <?= $iteration == 1 ? 'active' : ''; ?>" id="pills-<?= str_replace(' ', '', $row->nama_pembayaran) ?>-tab" data-toggle="pill" href="#pills-<?= str_replace(' ', '', $row->nama_pembayaran) ?>" role="tab" aria-controls="pills-<?= str_replace(' ', '', $row->nama_pembayaran) ?>" aria-selected="true"><?= $row->nama_pembayaran ?></a>
                                    </li>
                                    <?php $iteration++ ?>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    </div>

                    <div class="tab-content" id="pills-tabContent">

                        <?php $iteration = 1;
                        foreach ($this->db->get('pembayaran')->result()  as $row) :
                        ?>
                            <div class="tab-pane fade show <?= $iteration == 1 ? 'active' : ''; ?>" id="pills-<?= str_replace(' ', '', $row->nama_pembayaran) ?>" role="tabpanel" aria-labelledby="pills-<?= str_replace(' ', '', $row->nama_pembayaran) ?>-tab">
                                <table id="data-table" class="table table-striped projects">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%">Nama Tagihan</th>
                                            <th>Tahun</th>
                                            <th>Jumlah Tagihan</th>
                                            <th>Jumlah Dibayar</th>
                                            <th>Status</th>
                                            <th style="width: 20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if ($row->is_spp == 1) : ?>
                                            <div class="form-group">
                                                <label for="">Tahun</label>
                                                <select id="selectTahun" class="selectpicker mb-2">
                                                    <option>Pilih Tahun</option>
                                                    <?php
                                                    $this->db->select('tahun');
                                                    $this->db->distinct();
                                                    $this->db->order_by('tahun', 'desc');
                                                    $query = $this->db->get('tagihan');

                                                    foreach ($query->result() as $tahun) :
                                                    ?>
                                                        <option><?= $tahun->tahun ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <?php
                                            foreach ($this->db->get_where('tagihan', ['nis' => $siswa['nis'], 'is_spp' => 1])->result()  as $tagihan) :
                                            ?>
                                                <tr>

                                                    <td>
                                                        <?= $tagihan->nama_tagihan ?>
                                                    </td>
                                                    <td>
                                                        <?= $tagihan->tahun ?>
                                                    </td>
                                                    <td>
                                                        Rp.<?= $tagihan->harga ?>,-
                                                    </td>
                                                    <td>
                                                        Rp.<?= $tagihan->jml_dibayar ?>,-
                                                    </td>
                                                    <td>
                                                        <?php if ($tagihan->is_lunas == 0) : ?>
                                                            <button type="button" class="btn btn-danger btn-xs">Terhutang</button>
                                                        <?php else : ?>
                                                            <button type="button" class="btn btn-success btn-xs">Lunas</button>
                                                        <?php endif; ?>
                                                    </td>
                                                    <?php
                                                    $cek_cart = $this->db->get_where('cart', ['nis' => $siswa['nis'], 'id_tagihan' => $tagihan->id_tagihan])->row_array();
                                                    if (!empty($cek_cart)) :
                                                    ?>
                                                        <td>
                                                            <button id="cartButton" type="button" data-toggle="modal" data-target="#cartModal" class="btn btn-lg btn-success">
                                                                <i class="fa fa-shopping-cart"></i> Checkout
                                                            </button>

                                                        </td>
                                                    <?php
                                                    else :
                                                    ?>
                                                        <td>
                                                            <button id="bayarBtn" type="button" data-toggle="modal" data-target="#bayarModal" data-nis="<?= $tagihan->nis ?>" data-item="<?= $tagihan->nama_tagihan . ' ' . $tagihan->tahun ?>" data-id="<?= $tagihan->id_tagihan ?>" class="btn btn-success btn-xs"><i class="fa fa-money"></i> Bayar
                                                            </button>

                                                        </td>
                                                    <?php
                                                    endif;
                                                    ?>
                                                </tr>
                                            <?php endforeach; ?>


                                        <?php else : ?>
                                            <?php
                                            foreach ($this->db->get_where('tagihan', ['nis' => $siswa['nis'], 'is_spp' => 0, 'id_pembayaran' => $row->id])->result()  as $tagihan) :
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $tagihan->nama_tagihan ?>
                                                    </td>
                                                    <td>
                                                        <?= $tagihan->tahun ?>
                                                    </td>
                                                    <td>
                                                        Rp.<?= $tagihan->harga ?>,-
                                                    </td>
                                                    <td>
                                                        Rp.<?= $tagihan->jml_dibayar ?>,-
                                                    </td>
                                                    <td>
                                                        <?php if ($tagihan->is_lunas == 0) : ?>
                                                            <button type="button" class="btn btn-danger btn-xs">Terhutang</button>
                                                        <?php else : ?>
                                                            <button type="button" class="btn btn-success btn-xs">Lunas</button>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <button type="button" data-toggle="modal" data-target="#bayarModal" data-nis="<?= $tagihan->nis ?>" data-item="<?= $tagihan->nama_tagihan ?>" data-id="<?= $tagihan->id_tagihan ?>" class="btn btn-success btn-xs" id="btnCart"><i class="fa fa-money"></i> Bayar
                                                        </button>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                            <?php $iteration++ ?>
                        <?php endforeach; ?>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" id="confirmCartForm">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="cartModalLabel">Cart</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>


                                    <div class="modal-body" id="cart">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" id="confirmCart" class="btn btn-primary">Konfirmasi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="bayarModal" tabindex="-1" aria-labelledby="bayarModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" id="addCartForm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="bayarModalLabel">Masukkan Nominal Pembayaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="nisToCart" id="nisToCart">
                                        <input type="hidden" class="form-control" name="itemToCart" id="itemToCart">
                                        <input type="hidden" class="form-control" name="idTagihanToCart" id="idTagihanToCart">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp. </span>
                                            </div>
                                            <input type="text" class="form-control" id='rupiah' name="nominalToCart">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button id="tambahCart" type="button" class="btn btn-primary">Add To Cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                <?php endif; ?>


            </div>
            <!-- /page content -->

            <?php $this->load->view('bendahara/template/footer') ?>
</body>

<script>
    $(document).ready(function() {
        tampilCart()

        function tampilCart() {
            $.ajax({
                type: 'get',
                url: '<?= base_url('bendahara/pembayaran/getCart/') . $siswa['nis'] ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    total = 0;

                    if (data.length === 0) {
                        html += `<h2 class="text-center">Cart kosong</h2>`
                    } else {
                        for (i = 0; i < data.length; i++) {

                            html += `
                                <div class="row item justify-content-between">
                                    <div class="col-4 item-name ">
                                    ${data[i].item}
                                    </div>
                                    <div class="col-4 text-center">
                                        <span class="badge mr-2 item-price badge-pill badge-success">
                                        Rp.${data[i].nominal}
                                        </span>
                                        <button data-id="${data[i].id}" class="btn btn-danger hapusCart">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" value="${data[i].nominal}" name="nominal[]"></input>
                                <input type="hidden" value="${data[i].id_tagihan}" name="id_tagihan[]"></input>
                           `

                            total += parseInt(data[i].nominal)
                        }

                        html += `
                            <div class="row total justify-content-start">
                                <div class="col-4">
                                    <span class="badge item-price badge-pill badge-primary">
                                      Total :  Rp.${total}
                                    </span>
                                </div>
                            </div>
                        `
                    }



                    $('#cart').html(html);
                },
                error: function() {
                    alert('Tidak Dapat Menampilkan Data!');
                }
            });
        }



        $('#bayarModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var nis = button.data('nis')
            var item = button.data('item')
            var id_tagihan = button.data('id')


            var modal = $(this)
            modal.find('.modal-body #nisToCart').val(nis)
            modal.find('.modal-body #itemToCart').val(item)
            modal.find('.modal-body #idTagihanToCart').val(id_tagihan)
        })

        $('#tambahCart').click(function() {

            var data = $('#addCartForm').serialize();
            $.ajax({
                type: 'ajax',
                method: 'post',
                async: false,
                url: '<?= base_url('bendahara/pembayaran/addcart/') ?>',
                dataType: 'json',
                data: data,
                success: function(response) {
                    if (response.success) {
                        $('#addCartForm')[0].reset();
                        tampilCart();
                        swal({
                            title: "Good job!",
                            text: "Berhasil Menambahkan ke Cart!",
                            icon: "success",
                            button: "Ok",
                        });
                        $('#bayarModal').modal('hide');
                    } else {
                        $('#addCartForm')[0].reset();
                        tampilCart();
                        swal({
                            title: "Failed!",
                            text: response.message,
                            icon: "error",
                            button: "Ok",
                        });
                        $('#bayarModal').modal('hide');
                    }
                },
                error: function(response) {
                    $('#addCartForm')[0].reset();
                    swal({
                        title: "Failed!",
                        text: "Item Sudah ada di Cart! Hapus Terlebih Dahulu!",
                        icon: "error",
                        button: "Ok",
                    });
                    $('#bayarModal').modal('hide');

                }
            });
        });

        $('#cart').on('click', '.hapusCart', function(e) {
            e.preventDefault();
            var button = $(this)
            var id = button.data('id')
            $.ajax({
                type: 'post',
                async: false,
                url: '<?= base_url('bendahara/pembayaran/deleteCart/') ?>' + id,
                dataType: 'json',
                async: 'false',
                success: function(response) {
                    if (response.success) {
                        tampilCart();
                        swal({
                            title: "Good job!",
                            text: "Berhasil Menghapus Dari Cart!",
                            icon: "success",
                            button: "Ok!",
                        });
                        $('#cartModal').modal('hide');
                    }
                }
            });
        });


        $('.modal-footer').on('click', '#confirmCart', function(e) {

            var data = $('#confirmCartForm').serialize();
            $.ajax({
                type: 'ajax',
                method: 'post',
                async: false,
                url: '<?= base_url('bendahara/pembayaran/confirmpembayaran/') . $siswa['nis'];  ?>',
                dataType: 'json',
                async: 'false',
                data: data,
                success: function(response) {
                    if (response.success) {
                        $('#confirmCartForm')[0].reset();
                        tampilCart();
                        $('#cartModal').modal('hide');
                        window.location.replace('<?= base_url('bendahara/transaksi/success/') ?>' + response.kode_transaksi);
                    }
                }
            });
        });


    });
</script>

<script>
    $(document).ready(function() {

        var table = $('#data-table').DataTable({
            "order": [
                [1, "desc"]
            ],
            "lengthMenu": [
                [12, -1],
                [12, "All"]
            ]
        });

        $('#selectTahun').on('change', function() {
            table.search(this.value).draw();
        });


    });
</script>

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

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/build/css/style.css') ?>" rel="stylesheet">
</head>

<style>
    .kertas {
        max-width: 1000px;
        width: 100%;
        margin-right: auto;
        margin-left: auto;
    }

    #nomor {
        position: absolute;
        z-index: 10;
        bottom: 0;
        right: 0;
        font-weight: 900;
    }

    #header {
        position: relative;
    }

    .text-head {
        line-height: 20px;
    }

    #header h4 {
        line-height: 20px;
    }
</style>

<body>
    <div class="kertas">
        <div class="container">
            <div id="header" class="row justify-content-center invoice-header mt-0">
                <div class="col-auto mr-0 pr-0">
                    <img src="<?= base_url('assets/img/logo.png') ?>" style="height: 150px;" alt="">
                </div>
                <div class="col-9 text-center ml-0 pl-0">
                    <h5>MAJELIS PENDIDIKAN DASAR DAN MENENGAH</h5>
                    <h5>PIMPINAN DAERAH MUHAMMADIYAH KOTA PEKANBARU</h5>
                    <h4 class="font-weight-bold">SEKOLAH MENENGAH KEJURUAN MUHAMMADIYAH 1 PEKANBARU</h4>
                    <h6 class="text-head">BIDANG KEAHLIAN TEKNOLOGI REKAYASA<br>
                        BIDANG KEAHLIAN TEKNOLOGI INFORMASI DAN KOMUNIKASI<br>
                        BIDANG KEAHLIAN PARIWISATA<br>
                        BIDANG KEAHLIAN BISNIS DAN MANAJEMEN<br><span class="font-weight-bold">AKREDITASI A (UNGGUL)</span></h6>
                    <h5>JL. SENAPELAN NO.10 A PEKANBARU 28150 TELP. 0761 - 21681 FAX. 0761 - 21651</h5>
                    <div class="row justify-content-around pb-0">
                        <p class="text-justify mb-0">
                            E-mail : smkmutu_pku@yahoo.co.id <br>
                            Website : www.smkmutu-pku.sch.id <br> www.smkmutu-pku.sch.id
                        </p>
                        <p class="text-justify mb-0">
                            NSS : 324096002002 <br>
                            NOS : 5200.08.04.01 <br>
                            NPSN : 10403923
                        </p>
                    </div>
                </div>
                <span id="nomor"><?= $transaksi['kode_transaksi'] ?></span>

            </div>

            <div class="row mt-2">
                <div class="col-12">
                    <h4 class="text-center" style="text-decoration: underline;">"BUKTI PEMBAYARAN"</h4>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-2">Nama</div>
                <div class="col-auto px-0">:</div>
                <div class="col-auto"> <?= $siswa['nama'] ?></div>
            </div>
            <div class="row">
                <div class="col-2">NIS</div>
                <div class="col-auto px-0">:</div>
                <div class="col-auto"> <?= $siswa['nis'] ?></div>
            </div>
            <div class="row">
                <div class="col-2">Kelas</div>
                <div class="col-auto px-0">:</div>
                <div class="col-auto"> <?= $siswa['kelas'] ?></div>
            </div>

            <div class="row my-3">
                <?php
                $i = 1;
                foreach ($transaksi_detail as $t) :
                ?>
                    <div class="col-8 pl-5"><?= $i ?>. <?= $t['nama_item'] ?></div>
                    <div class="col-4">Rp. <?= number_format($t['nominal'], 2, ',', '.') ?></div>
                <?php $i++;
                endforeach; ?>
            </div>

            <!-- <div class="row">
                <div class="col-8">
                    <table border="1" class="table">
                        <tr>
                            <td class="p-0">1</td>
                            <td class="p-0">2</td>
                        </tr>
                        <tr>
                            <td class="p-0">1</td>
                            <td class="p-0">2</td>
                        </tr>
                        <tr>
                            <td class="p-0">1</td>
                            <td class="p-0">2</td>
                        </tr>
                    </table>
                </div>
            </div> -->

            <div class="row" style="border-top:1px solid #000;">
                <div class="col-1 offset-7">
                    JUMLAH
                    <!-- <ul style="list-style: none;">
                        <li>Jumlah Rp.</li>
                        <li>Pekanbaru</li>
                        <li>Penerima</li>
                    </ul> -->
                </div>
                <div class="col-4">
                    Rp. <?= number_format($transaksi['total'], 2, ',', '.') ?>
                </div>
            </div>

            <!-- <div class="row" style="height: 100px;">
                <div class="col-4">
                    <ul style="list-style: none; margin-top: 100px;">
                        <li>Lembar 1 Putih : Asli</li>
                        <li>Lembar 2 Merah : Kantor</li>
                        <li>Lembar 3 Kuning : Keuangan</li>
                    </ul>
                </div>
                <div class="col-4 offset-4">
                    <ul style="margin-top: 100px; list-style: none; ">
                        <li style="border-top: 1px solid #000;">
                            NBM
                        </li>
                    </ul>
                </div>
    
            </div> -->

            <div class="row mt-1">
                <div class="col-3 offset-9">
                    <div class="row">
                        <div class="col-12 pl-0">Pekanbaru, <?= date('d F Y') ?></div>
                        <div class="col-12 text-center">Penerima</div>
                        <div class="col-12 pl-0" style="margin-top: 80px;border-top: 1px solid #000;">NBM</div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

<script>
    window.print();
</script>

</html>
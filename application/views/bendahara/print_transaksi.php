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

<body>
    <div class="container">
        <div class="row justify-content-center invoice-header mt-5">
            <div class="col-2">
                <img src="<?= base_url('assets/img/logo.png') ?>" style="width: 150px; height: 180px;" alt="">
            </div>
            <div class="col-10 text-center">
                <h5>MAJELIS PENDIDIKAN DASAR DAN MENENGAH</h5>
                <h5>PIMPINAN DAERAH MUHAMMADIYAH KOTA PEKANBARU</h5>
                <h4 class="font-weight-bold">SEKOLAH MENENGAH KEJURUAN MUHAMMADIYAH 1 PEKANBARU</h4>
                <h6>BIDANG KEAHLIAN TEKNOLOGI REKAYASA</h6>
                <h6>BIDANG KEAHLIAN TEKNOLOGI INFORMASI DAN KOMUNIKASI</h6>
                <h6>BIDANG KEAHLIAN PARIWISATA</h6>
                <h6>BIDANG KEAHLIAN BISNIS DAN MANAJEMEN</h6>
                <h6 class="font-weight-bold">AKREDITASI A (UNGGUL)</h6>
                <h5>JL. SENAPELAN NO.10 A PEKANBARU 28150 TELP. 0761 - 21681 FAX. 0761 - 21651</h5>
                <div class="row justify-content-around">
                    <p class="text-justify">
                        E-mail : smkmutu_pku@yahoo.co.id <br>
                        Website : www.smkmutu-pku.sch.id <br> www.smkmutu-pku.sch.id
                    </p>


                    <p class="text-justify">
                        NSS : 324096002002 <br>
                        NOS : 5200.08.04.01 <br>
                        NPSN : 10403923
                    </p>
                </div>
            </div>


        </div>

        <div class="row mt-2">
            <div class="col-12">
                <h4 class="text-center" style="text-decoration: underline;">"BUKTI PEMBAYARAN"</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul style="list-style: none;">
                    <li>Nama : </li>
                    <li>NIS :</li>
                    <li>Kls/Jurs :</li>
                </ul>
            </div>
        </div>

        <div class="row" style="border-bottom:1px solid #000;">
            <div class="col-8">
                <ul style="list-style: none;">
                    <li>Uang SPP Bulan</li>
                    <li>Kewajiban Awal Tahun (KAT)</li>
                    <li>PKL</li>
                    <li>Uang Peningkatan Mutu</li>
                </ul>
            </div>

            <div class="col-4">
                <ul style="list-style: none;">
                    <li>Rp.</li>
                    <li>Rp.</li>
                    <li>Rp.</li>
                    <li>Rp.</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-4 offset-8">
                <ul style="list-style: none;">
                    <li>Jumlah Rp.</li>
                    <li>Pekanbaru</li>
                    <li>Penerima</li>
                </ul>
            </div>
        </div>

        <div class="row" style="height: 100px;">
            <div class="col-4">
                <ul style="list-style: none; margin-top: 100px;">
                    <li>Lembar 1 Putih : Asli</li>
                    <li>Lembar 2 Merah : Kantor</li>
                    <li>Lembar 3 Kuning : Keuangan</li>
                </ul>
            </div>
            <div class="col-4 offset-4">
                <ul style="margin-top: 150px; list-style: none; ">
                    <li style="border-top: 1px solid #000;">
                        NBM
                    </li>
                </ul>
            </div>
        </div>


    </div>
</body>

<script>
    window.print();
</script>

</html>
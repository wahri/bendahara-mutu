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
                    <div class="col-md-8">
                        <form class="form-inline" action="">
                            <select class="selectpicker" data-live-search="true">
                                <option>Cari Data Siswa</option>
                                <option>1810031 - Willy kurniawan</option>
                                <option>1810032 - Wahyu Nuzul Bahri</option>
                                <option>1810033 - Sukristyo</option>
                                <option>1810034 - Sukirman</option>
                                <option>1810035 - Tukijo</option>
                            </select>
                            <a href="hasilpencarian.html" class="btn btn-primary ml-3">Cari</a>
                        </form>

                    </div>
                </div>
            </div>
            <!-- /page content -->

            <?php $this->load->view('bendahara/template/footer') ?>
</body>

</html>
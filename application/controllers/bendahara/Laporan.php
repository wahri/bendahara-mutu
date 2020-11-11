<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends Bendahara_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = "Cari Siswa";
        $this->load->view('bendahara/laporan/laporan', $this->data);
    }
}

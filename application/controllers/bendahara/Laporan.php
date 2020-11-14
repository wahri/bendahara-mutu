<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends Bendahara_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function uang_masuk()
    {
        $this->data['title'] = 'Laporan Uang Masuk';
        $this->load->view('bendahara/laporan/uang_masuk', $this->data);
    }

    public function uang_keluar()
    {
        $this->data['title'] = 'Laporan Uang Keluar';
        $this->load->view('bendahara/laporan/uang_keluar', $this->data);
    }
}
